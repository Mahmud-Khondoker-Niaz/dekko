<?php

namespace App\Http\Controllers\Admin;


use App\Project;

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
class ProjectController extends MainAdminController
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
        return view('admin.project.index')->with('projects',Project::orderBy('created_at','asc')->get());
    }
    public function create()
    {

        return view('admin.project.create');
    }




    public function store(Request $request)


    { 
    if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }
        $this->validate($request,[
            
            'image_page'=>'required',

           'image_home'=>'required',
            'description' => 'required',
           
        
        ]);
		
		

        $featured = $request->image_home;
		$featured_new_name = time().$featured->getClientOriginalName();
		$featured->move('public/upload/blogs', $featured_new_name);


       $image = $request->image_page;
		$image_new_name = time().$image->getClientOriginalName();
		$image->move('public/upload/teams', $image_new_name);

		$team = Project::create(array(
			
			
			'description'=>$request->description,
			'image_home' => 'public/upload/blogs/' . $featured_new_name,
            'image_page' => 'public/upload/teams/' . $image_new_name,
			
		));
      
       
       

        Session::flash('Success','Project added Successfully.');
        $team->save();
        return redirect()->route('projects');
    }


    public function edit($id)
    {
    if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $team= Project::find($id);
        return view('admin.project.edit')->with('team',$team);
    }




    public function update(Request $request, $id)
    {

    if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        // $this->validate($request,[
        
            
        //     'image_page'=>'required',
        //     'image_home'=>'required',
           
        //     'description' => 'required',
           
        // ]);

        $team= Project::find($id);

      
 if($request->hasfile('image_page')){
            $image = $request->image_page;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('public/upload/teams', $image_new_name);
            $team->image_page ='/public/upload/teams/'.$image_new_name;
        }

        if($request->hasfile('image_home')){
            $featured = $request->image_home;
            $featured_new_name = time(). $featured->getClientOriginalName();
            $featured->move('public/upload/blogs/',  $featured_new_name);
            $team->image_home ='/public/upload/blogs/'.$featured_new_name;
        }

       

         $team->description=$request->description;
       
        $team->save();
      

        Session::flash('flash_message', 'Post updated successfully!');
        return redirect()->route('projects');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
  
 

    
}
