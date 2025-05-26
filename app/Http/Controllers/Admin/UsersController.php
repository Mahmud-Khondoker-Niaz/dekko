<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Properties;
use App\PropertyGallery;
use App\Enquire;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function userslist()    { 
         
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

        if(isset($_GET['keyword']))
        {
             
            $type=$_GET['type'];        
            $keyword=$_GET['keyword'];
        
            
            $allusers = User::SearchUserByKeyword($keyword,$type)->paginate(10);
 
            $allusers->appends($_GET)->links();  
        }
        else
        { 
          
            $allusers = User::where('usertype', '!=', 'Admin')->orderBy('id','desc')->paginate(10);
        }
       
         
        return view('admin.pages.users',compact('allusers'));
    } 


public function show($id)
     {

        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');

        }
        $decrypted_id = Crypt::decryptString($id);

          $user = User::findOrFail($decrypted_id);

          return view('admin.pages.usersdetails',compact('user'));
        // $agents=User::where('usertype','Agents')->orderBy('id', 'desc')->take(2)->get();
    //   return view('admin.pages.usersdetails',compact('user'));

     }

     
    public function addeditUser()    { 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
          
        return view('admin.pages.addeditUser');
    }
    
    public function addnew(Request $request)
    { 
    	
    	$data =  \Request::except(array('_token')) ;
	    
	   // $inputs = $request->all();
	    
        if(!empty($request['id']))
        {
            $rule=array(
                'name' => 'required',
                
                'profile_image' => 'mimes:jpg,jpeg,gif,png' 
                 );
        }
        else
        {
            $rule=array(
            'name' => 'required',
           
            'profile_image' => 'mimes:jpg,jpeg,gif,png' 
            );
        }
	    
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
	      
		if(!empty($request['id'])){
           
            $user = User::findOrFail($request['id']);

        }else{

            $user = new User;

        }
		
		 
        //User image
        
        $profile_file = $request->file('profile_image');

        if($profile_file){
            \File::delete(public_path() .$user->profile_image);
            $tmpFilePath = public_path('upload/profile_image/');
            $hardPath = time().$profile_file->getClientOriginalName();
            $img = Image::make($profile_file);
            $img->fit(400, 400)->save($tmpFilePath.$hardPath); 
            $sav_profile_imagpath = '/upload/profile_image/' . $hardPath;
            $user->profile_image = $sav_profile_imagpath;

        }

        $user->usertype = $request['usertype'];
       
		$user->name = $request['name'];	
        $user->email=$request['email']; 
	
		$user->phone = $request['phone'];
  		$user->about = $request['about'];
        $user->yrs_exp = $request['yrs_exp'];
   $user->nid = $request['nid'];
   $user->gender = $request['gender'];
   $user->dob = $request['dob'];
   $user->age = $request['age'];
   $user->school = $request['school'];
   $user->college = $request['college'];
   $user->university = $request['university'];
   $user->passing_year_ssc = $request['passing_year_ssc'];
   $user->passing_year_hsc = $request['passing_year_hsc'];
   $user->passing_year_graduation = $request['passing_year_graduation'];
   $user->present_address = $request['present_address'];
   $user->permanent_address = $request['permanent_address'];
   $user->facebook = $request['facebook'];
   $user->linkedin = $request['linkedin'];
   $user->status = $request['status'];
		
	 
	    $user->save();
		
		if(!empty($request['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));
            return \Redirect::back();
        }
    }
   

    
    public function editUser($id)    
    {     
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }		
    	  $decrypted_id = Crypt::decryptString($id);

          $user = User::findOrFail($decrypted_id);
           
          return view('admin.pages.addeditUser',compact('user'));
        
    }	 
    
    public function delete($id)
    {
    	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
    	
        $decrypted_id = Crypt::decryptString($id);	
        
        if($decrypted_id!=1)
        {

            $property_list = Properties::where('user_id',$decrypted_id)->get();

            foreach ($property_list as $property_data)
            {

                $property_gallery_images = PropertyGallery::where('property_id',$property_data->id)->get();

                foreach ($property_gallery_images as $gallery_images) {

                    \File::delete(public_path() .'/upload/gallery/'.$gallery_images->image_name);

                    $property_gallery_obj = PropertyGallery::findOrFail($gallery_images->id);
                    $property_gallery_obj->delete();
                }

                $property = Properties::findOrFail($property_data->id);
        
                \File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-b.jpg');
                \File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-s.jpg');

                 \File::delete(public_path() .'/upload/floorplan/'.$property->floor_plan.'-b.jpg');
                 \File::delete(public_path() .'/upload/floorplan/'.$property->floor_plan.'-s.jpg');
                 
                $property->delete();
            }    

            $user = User::findOrFail($decrypted_id);
        
            \File::delete(public_path() .'/upload/members/'.$user->image_icon.'-b.jpg');
            \File::delete(public_path() .'/upload/members/'.$user->image_icon.'-s.jpg');
                
            $user->delete();
        }
        else
        {
            \Session::flash('flash_message', trans('words.access_denied'));

             return redirect()->back();
        }
 
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }
    
  public function user_export()    
    {
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

          return Excel::download(new UsersExport, 'users.xlsx');

    }   
 
    	
}
