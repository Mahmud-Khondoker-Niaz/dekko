<?php
namespace App\Http\Controllers\Admin;
use Auth;
use App\User;
use App\FrontDesign;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class FrontDesignController extends MainAdminController
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

        return view('admin.pages.front-design.index')->with('alldata',FrontDesign::all())->with('user',Auth::user());
    }

  
    public function create()
    {
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        return view('admin.pages.front-design.create');
    }


    public function store(Request $request)
    {

        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $this->validate($request,[

            'title'=>'required',
            'image'=>'required|image|mimes:webp,jpg,jpeg,png,gif',
            'type'=>'required',
         
        ]);

       
        $image = $request->file('image');
        if($image != ''){
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('public/upload/front-designs', $image_new_name);
            $image = '/public/upload/front-designs/' . $image_new_name;

        }else {
            $image = 'default.png';
        }

        $frontdesign = FrontDesign::create(array(
            'title' => $request->title,
            'image' => $image,
            'link' => $request->link,
            'type' => $request->type,
        ));

        $frontdesign->save();

        \Session::flash('flash_message','Post Inserted successfully');
          
        return redirect()->back();
    }

 
    public function edit($id)
    {

        $data= FrontDesign::find($id);
        return view('admin.pages.front-design.edit')->with('data',$data);
    }

  
    public function update(Request $request, $id)
    {
 
        $this->validate($request,[
            'title'=>'required',
            'type'=>'required',
        ]);

        $frontdesign = FrontDesign::findOrFail($id);

        if($request->hasfile('image')){
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('public/upload/front-designs', $image_new_name);
           // $images ='/public/upload/front-designs/'.$image_new_name;
             $frontdesign->image ='/public/upload/front-designs/'.$image_new_name;
        }

     
        $frontdesign->title =$request->title;
        $frontdesign->link =$request->link;
        $frontdesign->type =$request->type;

        $frontdesign->save();

        \Session::flash('flash_message','Post updated successfully');
       return redirect()->route('frontd.index');
       //return redirect()->back();
    }

    public function delete($id)
    {

        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));
            return redirect('admin/dashboard');
            
        }

     
        $date = FrontDesign::findOrFail($id);

   
        $date->delete();

        \Session::flash('success','The post Deleted Successfully');
        return redirect()->back();
    }



}
