<?php
namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
//use App\Properties;
//use App\PropertyGallery;
//use App\Enquire;

use App\Service;
use App\ServiceCategory;
use App\ServiceSubcategory;
use App\ServiceChildcategory;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ServiceController extends MainAdminController
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

        return view('admin.pages.services.index')->with('services',Service::all())->with('user',Auth::user());
    }

  
    public function create()
    {

        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }else
        {
            
            $category_list = ServiceCategory::all();

            if ($category_list->count()==0 ){

                Session::flash('info', 'You must have some category & Tags before attemptin to create a post.');
                return redirect()->back();
            }

            return view('admin.pages.services.create')->with('category_list',$category_list);
        }

    }




    public function store(Request $request)
    {

        $this->validate($request,[

            'service_name'=>'required',
            'service_image'=>'required|image',
            'service_phone' => 'required|min:11|max:11',
         
        ]);

       
        $service_image = $request->file('service_image');
        if($service_image != ''){
            $service_image = $request->service_image;
            $service_image_new_name = time(). $service_image->getClientOriginalName();
            $service_image->move('public/uploads/services', $service_image_new_name);
            $service_image = '/public/uploads/services/' . $service_image_new_name;

        }else {
            $service_image = 'default.png';
        }

        $service = Service::create(array(
            'service_name' => $request->service_name,
            'service_description' => $request->service_description,
            'service_cost' => $request->service_cost,
            'service_phone' => $request->service_phone,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_id' => $request->childcategory_id,
            'service_image' => $service_image,
            'slug' => Str::slug($request->service_name),
            'user_id' => Auth::id(),

        ));

       
        
        $service->save();
        Session::flash('success','Your Website Submission Successfully.');
        return redirect()->back();

    }


 
    public function edit($id)
    {

        $service= Service::find($id);
        return view('admin.pages.services.edit')->with('service',$service)
                    ->with('scategories',ServiceCategory::all())->with('subcategories',ServiceSubcategory::all())->with('childcategories',ServiceChildcategory::all());
    }

  
    public function update(Request $request, $id)
    {

        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

        $this->validate($request,[
            'service_name'=>'required',
            //'service_category_id' => 'required'
        ]);

        $service = Service::findOrFail($id);

        if($request->hasfile('service_image')){
            $service_image = $request->service_image;
            $service_image_new_name = time().$service_image->getClientOriginalName();
            $service_image->move('public/uploads/services', $service_image_new_name);
            $service->service_image ='/public/uploads/services/'.$service_image_new_name;
        }

    
        $service->service_name =$request->service_name;
        $service->service_description =$request->service_description;
        $service->service_phone =$request->service_phone;
        $service->service_cost =$request->service_cost;
        $service->category_id =$request->category_id;
        $service->subcategory_id =$request->subcategory_id;
        $service->childcategory_id =$request->childcategory_id;
    
        $service->slug = Str::slug($request->service_name);

        $service->user_id = Auth::id();

        
        $service->save();

        Session::flush('success','Service updated successfully');

        return redirect()->route('services');
    }

    public function destroy($id)
    {

        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));
            return redirect('admin/dashboard');
            
        }

     
        $date = Service::findOrFail($id);

   
        $date->delete();
        Session::flash('success','The post was just trashed');
        return redirect()->back();
    }

    // public function trashed()
    // {
    //     $posts = Post::onlyTrashed()->get();

    //   return view('admin.posts.trashed')->with('posts',$posts);
    // }

    // public function kill($id)
    // {
    //     $post = Post::withTrashed()->where('id',$id)->first();

    //     $post->forceDelete();
    //     Session::flash('success', 'Post deleted permanently');
    //     return redirect()->back();

    // }

    // public function restore($id)
    // {
    //     $post = Post::withTrashed()->where('id',$id)->first();

    //     $post->restore();
    //     Session::flash('success', 'Post Restore Successfully');
    //     return redirect()->route('posts');

    // }


}
