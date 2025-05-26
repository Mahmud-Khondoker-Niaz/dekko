<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Addproperty;
use App\PropertyGallery;
use App\Enquire;
use App\Interest;
use App\Types;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str; 

class AddpropertiesController extends Controller
{
	public function __construct()
    {
         check_property_exp(); 
    } 
   
    public function creat()
    {  
    
            return view('addproperty.creat');
        	    
        
    }
    public function store(Request $request)

    {
        $this->validate($request,[
            'name'=>'required',
            'number'=>'required',
           
            'size'=>'required',
            'address'=>'required',
          

             ]);

             $image = $request->featured_image;
             $image_new_name = time().$image->getClientOriginalName();
             $image->move('public/upload/teams', $image_new_name);
 
  
        $addproperty = Addproperty::create(array(
			
			'name' => $request->name,
			'number' => $request->number,
            'description' => $request->description,
		
            'address' => $request->address,
           
            'size' => $request->size,
           
			'featured_image' => 'public/upload/teams/' . $image_new_name,
			
		));
        Session::flash('success','Your requesting data has been sent successfully.');
        $addproperty->save();
        return redirect()->back();
    }
}