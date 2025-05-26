<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Pages;
use App\Service;
use App\ServiceCategory;
use App\ServiceSubcategory;
use App\ServiceChildcategory;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 

use Session;

class PagesController extends Controller
{
	public function __construct()
    {
         check_property_exp(); 
    }
      
    public function get_page($slug)
    {

        $page_info = Pages::where('page_slug',$slug)->first();
        return view('pages.pages',compact('page_info'));
    }     
    public function category_details($slug, $id)
    {
        $category_id = (ServiceCategory::where('slug', $slug)->first() != null) ? ServiceCategory::where('slug', $slug)->first()->id : null;
        $subcategory_id = (ServiceSubcategory::where('slug', $slug)->first() != null) ? ServiceSubcategory::where('slug', $slug)->first()->id : null;
        $subsubcategory_id = (ServiceChildcategory::where('slug', $slug)->first() != null) ? ServiceChildcategory::where('slug', $slug)->first()->id : null;
 
        $conditions = ['status' => 1];
        if($category_id != null){
            $conditions = array_merge($conditions, ['category_id'=>$category_id]);
        }
        if($subcategory_id != null){
            $conditions = array_merge($conditions, ['subcategory_id'=>$subcategory_id]);
        }
        if($subsubcategory_id != null){
            $conditions = array_merge($conditions, ['childcategory_id'=>$subsubcategory_id]);
        }
        $service = Service::where($conditions)->get();
        return view('pages.service-pages',compact('category_id','subcategory_id','subsubcategory_id','service'));


    }
}
