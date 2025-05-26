<?php

namespace App\Http\Controllers\Admin;


use App\Team;

use Auth;
use App\User;
use App\Addproperty;
use Session;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
class TeamController extends MainAdminController
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
        return view('admin.teams.index')->with('teams',Team::orderBy('created_at','asc')->get());
    }
    
     public function property_request()
    {
        return view('admin.property_request')->with('properties',Addproperty::orderBy('created_at','desc')->get());
    }
    Public function property_details($id){
        $properties = Addproperty::find($id);
        return view('admin.request_property_details',compact('properties',$properties)); 

    }
    public function create()
    {

        return view('admin.teams.create');
    }




    public function store(Request $request)


    { 
    if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required|image',
            'email'=>'required',
            'designation' => 'required',
           
        
        ]);
		
		

        $image = $request->image;
		$image_new_name = time().$image->getClientOriginalName();
		$image->move('public/upload/teams', $image_new_name);

		$team = Team::create(array(
			
			'name' => $request->name,
			'designation' => $request->designation,
			'description'=>$request->description,
			'email' => $request->email,
			'linkdn' => $request->linkdn,
			'image' => 'public/upload/teams/' . $image_new_name,
			
		));
      
       
       

        Session::flash('Success','Your team member added Successfully.');
        $team->save();
        return redirect()->route('teams');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function status($id)
    {   
        $decrypted_id = Crypt::decryptString($id);

        $Team = Team::findOrFail($decrypted_id);
       
        if(Auth::User()->id!=$Team->user_id and Auth::User()->usertype!="Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
       
        if($Team->status==1)
        {
            $Team->status='0';       
            $Team->save();
            
            \Session::flash('flash_message', trans('words.unpublish'));
        }
        else
        {
            $Team->status='1';       
            $Team->save();
            
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

        $team= Team::find($id);
        return view('admin.teams.edit')->with('team',$team);
    }

    public function update(Request $request, $id)
    {

    if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required'
           
        ]);

        $team= Team::find($id);

      
 if($request->hasfile('image')){
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('public/upload/teams', $image_new_name);
            $team->image ='/public/upload/teams/'.$image_new_name;
        }



       
        $team->name=$request->name;
        $team->designation=$request->designation;
         $team->description=$request->description;
        $team->email =$request->email;
        $team->linkdn =$request->linkdn;
        $team->save();
      

        Session::flash('flash_message', 'Post updated successfully!');
        return redirect()->route('teams');
    }
   
    public function destroy($id)
    {
        $team = Team::find($id);



        $team->delete();
        Session::flash('success','Member Deleted successfully');
        return redirect()->route('teams');
    }
    public function trash($id)
    {
        $property = Addproperty::find($id);



        $property->delete();
        Session::flash('success','Requested Deleted successfully');
        return redirect()->route('property_request');
    }
 

    
}
