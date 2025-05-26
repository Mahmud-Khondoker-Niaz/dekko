<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
//use App\Properties;
//use App\PropertyGallery;
//use App\Enquire;
use App\ServiceCategory;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceCategoryController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function index()
    {  
        if(Auth::User()->usertype!="Admin"){

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
            }
           
    	$service_categories = ServiceCategory::orderBy('id', 'asc')->get();
		  
        return view('admin.pages.service-categories.index',compact('service_categories'));
    } 
	
    public function create()    { 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
          
        return view('admin.pages.service-categories.create');
    }



    
    public function store(Request $request)
    {  
    	
    	$data =  \Request::except(array('_token')) ;
	    
	    $inputs = $request->all();
	    
	    $rule=array(
		        'name' => 'required'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
	      
		if(!empty($inputs['id'])){
           
            $name = ServiceCategory::findOrFail($inputs['id']);

        }else{

            $name = new ServiceCategory;

        }
		
		 
		$slug  = Str::slug($inputs['name'], "-");		  
		 
		$name->name = $inputs['name'];
		$name->slug = $slug;		 
		  
		 
	    $name->save();
		
		if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }		     
        
         
    }     

    
    public function edit($id){ 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
          
        $category = ServiceCategory::find($id);

        return view('admin.pages.service-categories.edit')->with('category',$category);

    }

    public function update(Request $request, $id)    
    {     
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }		
    		     
          $scategory = ServiceCategory::findOrFail($id);
          $scategory->name=$request->name;
          $scategory->slug=Str::slug($request->name);
          $scategory->save();
         
         // return redirect()->back();
         $service_categories = ServiceCategory::all();
         return view('admin.pages.service-categories.index')->with('service_categories',$service_categories);
        
    }	 
    
    public function delete($id)
    {
    	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

        // $property_list = Properties::where('property_type',$id)->get();

        // foreach ($property_list as $property_data)
        // {

        //     $property_gallery_images = PropertyGallery::where('property_id',$property_data->id)->get();

        //     foreach ($property_gallery_images as $gallery_images) {

        //         \File::delete(public_path() .'/upload/gallery/'.$gallery_images->image_name);

        //         $property_gallery_obj = PropertyGallery::findOrFail($gallery_images->id);
        //         $property_gallery_obj->delete();
        //     }

        //     $property = Properties::findOrFail($property_data->id);
    
        //     \File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-b.jpg');
        //     \File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-s.jpg');

        //      \File::delete(public_path() .'/upload/floorplan/'.$property->floor_plan.'-b.jpg');
        //      \File::delete(public_path() .'/upload/floorplan/'.$property->floor_plan.'-s.jpg');
             
        //     $property->delete();
        // }
        
    		
        $type = ServiceCategory::findOrFail($id);         
		$type->delete();
		
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }
      
    	
}
