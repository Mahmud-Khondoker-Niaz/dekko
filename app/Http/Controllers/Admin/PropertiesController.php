<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Properties;
use App\PropertyGallery;
use App\Enquire;
use App\Types;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

use App\Exports\PropertiesExport;
use Maatwebsite\Excel\Facades\Excel;

class PropertiesController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function propertieslist()
    {  
    	if(Auth::User()->usertype!="Admin"){

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
            }
    	
    	if(isset($_GET['keyword']))
        {
        	$purpose=$_GET['purpose'];
	        $type=$_GET['type'];	 	
		 	$keyword=$_GET['keyword'];
        
    	 	
    	 	$propertieslist = Properties::SearchByKeyword($keyword,$purpose,$type)->paginate(10);
 
            $propertieslist->appends($_GET)->links();  
        }
        else
        {
        	$propertieslist = Properties::orderBy('id','desc')->paginate(10);
		}
    	
		  
        return view('admin.pages.properties',compact('propertieslist'));
    } 

    public function plan_update(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
       $inputs = $request->all(); 

       $plan_id = $inputs['plan_id']; 
       $property_id = $inputs['property_id'];

       $property_exp_date = $inputs['property_exp_date'];
       $property_status = $inputs['status']; 
        
        $property_obj = Properties::findOrFail($property_id);
          
        $property_obj->active_plan_id = $plan_id;
        $property_obj->property_exp_date = strtotime($property_exp_date);            
        $property_obj->status = $property_status;   

       
        $property_obj->save();

        \Session::flash('flash_message', 'Plan updated successfully!');
        return redirect()->back();

    }

    
    public function position_update(Request $request)
    {
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $data =  \Request::except(array('_token')) ;
        $inputs = $request->all(); 

        $rule=array(
            'position_id' => 'required|unique:properties',
            'position_exp_date' => 'required',
            'position_status' => 'required' 
            );
    
        $validator = \Validator::make($data,$rule);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        } 



       $position_id = $inputs['position_id']; 
       $property_id = $inputs['property_id'];

       $position_exp_date = $inputs['position_exp_date'];
       $position_status = $inputs['position_status']; 
       
        $data_obj = Properties::findOrFail($property_id);

        if($position_status == 0){

            $data_obj->position_id = 99;
            $data_obj->position_exp_date = 0;            
            $data_obj->position_status = 0; 

            $data_obj->save();
	   		
            \Session::flash('flash_message', trans('words.unpublish'));
            

        }else{

        $data_obj->position_id = $position_id;
        $data_obj->position_exp_date = strtotime($position_exp_date);            
        $data_obj->position_status = $position_status;   

        $data_obj->save();

        \Session::flash('flash_message', 'Position & status updated successfully!');
      
         }
          
     return redirect()->back();
       
        

    }

 
	public function delete($id)
    {
    	 
    		
       if(Auth::User()->usertype!="Admin"){

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
            }

        $decrypted_id = Crypt::decryptString($id);  
            
        $property = Properties::findOrFail($decrypted_id);
        
        \File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-b.jpg');
        \File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-s.jpg');

        \File::delete(public_path() .'/upload/floorplan/'.$property->floor_plan.'-b.jpg');
        \File::delete(public_path() .'/upload/floorplan/'.$property->floor_plan.'-s.jpg');
         
        $property->delete();

        $property_gallery_images = PropertyGallery::where('property_id',$decrypted_id)->get();

        foreach ($property_gallery_images as $gallery_images) {

            \File::delete(public_path() .'/upload/gallery/'.$gallery_images->image_name);

            $property_gallery_obj = PropertyGallery::findOrFail($gallery_images->id);
            $property_gallery_obj->delete();
        }
        
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }
	
	
	public function status($id)
    { 	
    	$decrypted_id = Crypt::decryptString($id);

        $property = Properties::findOrFail($decrypted_id);
       
       	if(Auth::User()->id!=$property->user_id and Auth::User()->usertype!="Admin")
       	{

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
       
		if($property->status==1)
		{
			$property->status='0';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', trans('words.unpublish'));
		}
		else
		{
			$property->status='1';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', trans('words.published'));
		}
		 
        return redirect()->back();

    }
    
        public function soldout($id)
    {
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
        
        $decrypted_id = Crypt::decryptString($id);

        $property = Properties::findOrFail($decrypted_id);
       
		if($property->soldout==1)
		{
			$property->soldout='0';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', 'Unset Soldout');
		}
		else
		{
			$property->soldout='1';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', 'Soldout Successfull');
		}
		 
        return redirect()->back();

    }
	
	public function featuredproperty($id)
    {
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
        
        $decrypted_id = Crypt::decryptString($id);

        $property = Properties::findOrFail($decrypted_id);
       
		if($property->featured_property==1)
		{
			$property->featured_property='0';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', trans('words.property_unset_from_featured'));
		}
		else
		{
			$property->featured_property='1';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', trans('words.property_set_as_featured'));
		}
		 
        return redirect()->back();

    }

    public function property_export()    
    {
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

        return Excel::download(new PropertiesExport, 'properties.xlsx');

    }
      
    	
}
