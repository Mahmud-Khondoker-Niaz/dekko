<?php
namespace App\Http\Controllers\Admin;
use Auth;
use App\User;
use App\Promotionslider;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class PromotionSliderController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function sliderlist()
    {  
    	$allslider = Promotionslider::orderBy('id')->get();
		  
        return view('admin.pages.promotion-slider.index',compact('allslider'));
    } 
	
	public function addeditSlide()    { 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
          
        return view('admin.pages.promotion-slider.addeditslider');
    }
    
    public function addnew(Request $request)
    { 
    	
    	$data =  \Request::except(array('_token')) ;
	    
	   // $inputs = $request->all();

	    $rule=array(
		        'photo' => 'mimes:jpg,jpeg,gif,png' 
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
	      
		if(!empty($request['id'])){
           
            $slide = Promotionslider::findOrFail($request['id']);

        }else{

            $slide = new Promotionslider;

        }
		
		 
		//Slide image
		$image = $request->file('photo');
      
        if($image){
            
            // $image = $request->photo;
            // $image_new_name = time(). $image->getClientOriginalName();
            // $image->move('upload/promotion-slides', $image_new_name);
            // $image = '/upload/promotion-slides/' . $image_new_name;
            
           \File::delete(public_path() .$slide->photo);
		    
           $tmpFilePath = public_path('upload/promotion-slides/');
           

            $hardPath = time().$image->getClientOriginalName();
  
            $img = Image::make($image);

          
            $img->fit(750, 750)->save($tmpFilePath.$hardPath);
             
            $savimagpath = '/upload/promotion-slides/' . $hardPath;
         
           $slide->photo =  $savimagpath; 
           
             
        }
		 
        
		$slide->name = $request['name'];
        $slide->link = $request['link'];		 
       
		 
	    $slide->save();
		
		if(!empty($request['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }		     
        
         
    }     
    
    public function editSlide($id)    
    {     
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }		
    	  $decrypted_id = Crypt::decryptString($id);  

          $slide = Promotionslider::findOrFail($decrypted_id);
           
          return view('admin.pages.promotion-slider.addeditslider',compact('slide'));
        
    }	 
    
    public function delete($id)
    {
    	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
    	
        $decrypted_id = Crypt::decryptString($id);

        $slide = Promotionslider::findOrFail($decrypted_id);
        
		\File::delete(public_path() .$slide->photo);
		 
		$slide->delete();
		
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }
      
    	
}
