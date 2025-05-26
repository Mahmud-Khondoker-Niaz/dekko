<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Productscategory; 
use App\Productsbrand; 
use App\Brandcategory; 
use App\Sku; 
use App\Hire; 
 
use Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
	public function __construct()
    {
         check_property_exp(); 
    } 

    public function index(){
     
        $products=Productsbrand::orderBy('created_at', 'asc')->paginate(9);
        return view('products.index')->with('products',$products)
            ->with('allcategories',Productscategory::all())
            ->with('all_post',Productsbrand::take(20)->get());
    }
    public function category($slug){
       
        $category= Productscategory::where('slug', $slug)->first();
        return view('products.category')->with('category',$category)
            
            ->with('all_categories', Productscategory::all());
    }
    
    public function brandcategory($slug){
 
        $brandcategory= Brandcategory::where('slug', $slug)->first();
        $brandcategories = $brandcategory->productscategory->brandcategory;
        return view('brand.category')->with('brandcategory', $brandcategory)->with('brandcategories', $brandcategories);
    
    }
    
    public function brand($id){
 
        $brand = Productsbrand::with('skus')->findOrFail($id);
        $related=Productsbrand::where('productscategory_id', '=', $brand->Productscategory->id)->where('id', '!=', $brand->id)->get();
        return view('products.brand',compact('brand')) ->withRelated($related);
    }
   

    public function details(Request $request)
    {
        $skuId = $request->input('skuId');
        $sku = Sku::find($skuId);

        return view('products.brand',compact('sku'));
    }

    
    	 
    
   
}
