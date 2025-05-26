<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\ServiceCategory;
use App\ServiceSubcategory;
use App\ServiceChildcategory;

use App\Service;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceSubcategoryController extends MainAdminController
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
           
    	$service_subcategories = ServiceSubcategory::all();
		  
        return view('admin.pages.service-subcategories.index',compact('service_subcategories'));
    } 
	
    public function create()    { 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
         
        return view('admin.pages.service-subcategories.create')->with('scategories',ServiceCategory::all());
    }



    
    public function store(Request $request)
    {  
    	
    	$data =  \Request::except(array('_token')) ;
	    
	    $inputs = $request->all();
	    
	    $rule=array(
                'name' => 'required',
                'service_category_id' => 'required'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        } 
	      
		if(!empty($inputs['id'])){
           
            $name = ServiceSubcategory::findOrFail($inputs['id']);

        }else{

            $name = new ServiceSubcategory;

        }
		
		 
		$slug  = Str::slug($inputs['name'], "-");		  
		 
        $name->name = $inputs['name'];
        $name->service_category_id = $inputs['service_category_id'];
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

    public function get_subcategory(Request $request)
    {
        $cat_id = $request->get('cat_id');
        $html4 ='';
        $html5 ='';
        $ServiceSubcategory = ServiceSubcategory::where('service_category_id', $cat_id)->get();
        $html4 = "<option>Select Subcategory</option>";
        foreach($ServiceSubcategory as $ServiceSubcategoryData){
            $html4.= "<option value=\"$ServiceSubcategoryData->id\">$ServiceSubcategoryData->name</option>";           
        }
        $html5.=$html4;
        return response()->json(['html5'=>$html5]);
    }

    public function get_childsubcategory(Request $request)
    {
        $sub_cat_id = $request->get('sub_cat_id');
        $html1 ='';
        $html6 ='';
        $ServiceChildcategory = ServiceChildcategory::where('service_subcategory_id', $sub_cat_id)->get();
        $html1 = "<option>Select Child Category</option>";
        foreach($ServiceChildcategory as $ServiceChildcategoryData){
            $html1.= "<option value=\"$ServiceChildcategoryData->id\">$ServiceChildcategoryData->name</option>";           
        }
        $html6.=$html1;
        return response()->json(['html6'=>$html6]);
    }
    

    
    public function edit($id){ 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

      
        $subcategory = ServiceSubcategory::find($id);
        $parent_categories = ServiceCategory::all();

        return view('admin.pages.service-subcategories.edit')->with('subcategory',$subcategory)->with('parent_categories',$parent_categories);

    }

    public function update(Request $request, $id)    
    {     
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }		
    		     
          $subcategory = ServiceSubcategory::findOrFail($id);
          $subcategory->name=$request->name;

          $subcategory->slug=Str::slug($request->name);
          $subcategory->service_category_id=$request->service_category_id;
          $subcategory->save();
         
        $service_subcategories = ServiceSubcategory::all();
        return view('admin.pages.service-subcategories.index')->with('service_subcategories',$service_subcategories);
        
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
        
    		
        $type = ServiceSubcategory::findOrFail($id);         
		$type->delete();
		
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }
      
    	
}
