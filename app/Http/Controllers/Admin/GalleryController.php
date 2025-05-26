<?php

namespace App\Http\Controllers\Admin;


use App\Gallery;

use Auth;
use App\User;
use Session;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
class GalleryController extends MainAdminController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function __construct()
  {
  $this->middleware('auth');	
      
  parent::__construct();
       
  }
    public function index()
    {
        return view('admin.gallery.index')->with('galleries',Gallery::orderBy('created_at','desc')->get());
    }
    public function create()
    {

        return view('admin.gallery.create');
    }

    public function store(Request $request)


    { 
    if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }
        $this->validate($request,[
            'caption'=>'required',
            'image'=>'required|image',
            
            
           
        
        ]);
		
		

        $image = $request->image;
		$image_new_name = time().$image->getClientOriginalName();
		$image->move('public/upload/gallery', $image_new_name);

		$gallery = Gallery::create(array(
			
			'caption' => $request->caption,
			'description' => $request->description,
			'image' => 'public/upload/gallery/' . $image_new_name,
			
		));
      
       
       

        Session::flash('Success','Your image added Successfully.');
        $gallery ->save();
        return redirect()->route('galleries');
    }

    public function status($id)
    {   
        $decrypted_id = Crypt::decryptString($id);

        $Gallery = Gallery::findOrFail($decrypted_id);
       
        if(Auth::User()->id!=$Gallery->user_id and Auth::User()->usertype!="Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
       
        if($Gallery->status==1)
        {
            $Gallery->status='0';       
            $Gallery->save();
            
            \Session::flash('flash_message', trans('words.unpublish'));
        }
        else
        {
            $Gallery->status='1';       
            $Gallery->save();
            
            \Session::flash('flash_message', trans('words.published'));
        }
         
        return redirect()->back();

    }
 
    public function edit($id)
    {
    if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $gallery= Gallery::find($id);
        return view('admin.gallery.edit')->with('gallery',$gallery);
    }

    public function update(Request $request, $id)
    {

    if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $this->validate($request,[
            'caption'=>'required',
            
           
        ]);

        $gallery= Gallery::find($id);

      
 if($request->hasfile('image')){
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('public/upload/gallery', $image_new_name);
            $gallery->image ='/public/upload/gallery/'.$image_new_name;
        }



       
        $gallery->caption=$request->caption;
        $gallery->description=$request->description;
        
        $gallery->save();
      

        Session::flash('flash_message', 'Post updated successfully!');
        return redirect()->route('galleries');
    }
   
    public function destroy($id)
    {
        $gallery = Gallery::find($id);



        $gallery->delete();
        Session::flash('success','Image Deleted successfully');
        return redirect()->route('galleries');
    }

    

    
}
