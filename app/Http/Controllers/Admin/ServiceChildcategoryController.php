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

class ServiceChildcategoryController extends MainAdminController
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
           
    	$service_childcategories = ServiceChildcategory::all();
		  
        return view('admin.pages.service-childcategories.index',compact('service_childcategories'));
    } 
	
    public function create()    { 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
         
        return view('admin.pages.service-childcategories.create')->with('pcategories',ServiceCategory::all());
    }


    public function cat_get_subcategory(Request $request)
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


    
    public function store(Request $request)
    {  
    	
    	$data =  \Request::except(array('_token')) ;
	    
	    $inputs = $request->all();
	    
	    $rule=array(
                'name' => 'required',
                'service_subcategory_id' => 'required'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        } 
	      
		if(!empty($inputs['id'])){
           
            $name = ServiceChildcategory::findOrFail($inputs['id']);

        }else{

            $name = new ServiceChildcategory;

        }
		
		 
		$slug  = Str::slug($inputs['name'], "-");		  
		 
        $name->name = $inputs['name'];
        $name->service_subcategory_id = $inputs['service_subcategory_id'];
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

      
        $childcategory = ServiceChildcategory::find($id);
        $sub_categories = ServiceSubcategory::all();

        return view('admin.pages.service-childcategories.edit')->with('childcategory',$childcategory)->with('sub_categories',$sub_categories);

    }

    public function update(Request $request, $id)    
    {     
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }		
    		     
          $childcategory = ServiceChildcategory::findOrFail($id);
          $childcategory->name=$request->name;

          $childcategory->slug=Str::slug($request->name);
          $childcategory->service_subcategory_id=$request->service_subcategory_id;
          $childcategory->save();
         
         return redirect()->back();
        \Session::flash('flash_message', trans('words.updated'));
        
        // return view(route('subcategory.index'));
       // return view('admin.pages.service-childcategories.index');
        
    }	 
    
    public function delete($id)
    {
    	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
        }

       	
        $type = ServiceChildcategory::findOrFail($id);         
		$type->delete();
		
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }
      
    	
}
