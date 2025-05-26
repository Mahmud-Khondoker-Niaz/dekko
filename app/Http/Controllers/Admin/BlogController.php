<?php

namespace App\Http\Controllers\Admin;
use App\Blogcategory;
use App\Blog;

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

class BlogController extends MainAdminController
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
        return view('admin.blogs.index')->with('blogs',Blog::orderBy('created_at','desc')->get());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.blogs.blog-post')->with('categories',Blogcategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }
        $this->validate($request,[
            'title'=>'required',
			'check'=>'required',
            'feature' => 'mimes:jpg,jpeg,gif,png',
            'description' => 'required',
            'blogcategory_id' => 'required',
            //'tags' => 'required',
        ]);
		
		$user_id=Auth::user()->id;
		
        if($request->check == 1)
       {
			$name ='Dekko Foods Ltd';
			$designation = 'Admin';
			$image_save = 'public/site_assets/img/kazi-manzur.jpg';
			
		}else{
			
			$image = $request->image;
			$image_new_name = time().$image->getClientOriginalName();
			$image->move('public/upload/blogs', $image_new_name);
			$image_save='public/upload/blogs/' . $image_new_name;
			
			$name = $request->name;
			$designation = $request->designation;
		}
		
		$featured = $request->feature;
		$featured_new_name = time().$featured->getClientOriginalName();
		$featured->move('public/upload/blogs', $featured_new_name);
			
		$blog = Blog::create(array(
			'check'=>$request->check,
			'name' => $name,
			'designation' => $designation,
			'image' => $image_save,
			
			'title' => $request->title,
			'description' => $request->description,
			'feature' => 'public/upload/blogs/' . $featured_new_name,
			'blogcategory_id' => $request->blogcategory_id,
			'slug' => Str::slug($request->title),
			'user_id' => $user_id,
		));
			
       
        $blog->save();

       
         
         
        
        Session::flash('success','Your post Submission Successfully.');
        return redirect()->route('blogs');
    }

    public function status($id)
    {   
        $decrypted_id = Crypt::decryptString($id);

        $Blog = Blog::findOrFail($decrypted_id);
       
        if(Auth::User()->id!=$Blog->user_id and Auth::User()->usertype!="Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
       
        if($Blog->status==1)
        {
            $Blog->status='0';       
            $Blog->save();
            
            \Session::flash('flash_message', trans('words.unpublish'));
        }
        else
        {
            $Blog->status='1';       
            $Blog->save();
            
            \Session::flash('flash_message', trans('words.published'));
        }
         
        return redirect()->back();

    }

    public function show(Blog $blog)
    {
        //
    }


    public function edit($id)
    {
    if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $blog= Blog::find($id);
        return view('admin.blogs.edit')->with('blog',$blog)
            ->with('blogcategories',Blogcategory::all());
    }


    public function update(Request $request, $id)
    {

    if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'blogcategory_id' => 'required'
        ]);

        $blog= Blog::find($id);

        if($request->hasfile('feature')){
            $feature = $request->feature;
            $featured_new_name = time().$feature->getClientOriginalName();
            $feature->move('public/upload/blogs', $featured_new_name);
            $blog->feature ='/public/upload/blogs/'.$featured_new_name;
        }
 if($request->hasfile('image')){
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('public/upload/blogs', $image_new_name);
            $blog->image ='/public/upload/blogs/'.$image_new_name;
        }



        $blog->title =$request->title;
$blog->name=$request->name;
        $blog->designation=$request->designation;
        $blog->description =$request->description;
        //$blog->tags =$request->tags;
        $blog->blogcategory_id =$request->blogcategory_id;
        $blog->slug = Str::slug($request->title);
        $blog->user_id = Auth::User()->id;
//dd($blog->user_id);
        $blog->save();
      

        Session::flash('flash_message', 'Post updated successfully!');
        return redirect()->route('blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $blog = Blog::find($id);

        $blog->delete();

        Session::flash('success','The post was just trashed');
        return redirect()->back();
    }

    public function trashed()
    {
        $blog = Blog::onlyTrashed()->get();

        return view('admin.blogs.trashed')->with('blog',$blog);
    }

    public function kill($id)
    {
        $blog = Blog::withTrashed()->where('id',$id)->first();

        $blog->forceDelete();
        Session::flash('success', 'Post deleted permanently');
        return redirect()->back();

    }

    public function restore($id)
    {
        $blog = Blog::withTrashed()->where('id',$id)->first();

        $blog->restore();
        Session::flash('success', 'Post Restore Successfully');
        return redirect()->route('blogs');

    }

}
