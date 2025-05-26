<?php
namespace App\Http\Controllers\Admin;
use Auth;
use App\User;
use App\Upazila;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpazilaController extends MainAdminController
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
           
    	$upazila = Upazila::orderBy('id','asc')->get();
        return view('admin.pages.location.upazilas.index',compact('upazila'));
    } 
	
    public function create(){ 
        if(Auth::User()->usertype!="Admin"){
            \Session::flash('flash_message', trans('words.access_denied'));
            return redirect('admin/dashboard');
        }
        return view('admin.pages.location.upazilas.create');
    }

    public function store(Request $request)
    {    	
    	$data =  \Request::except(array('_token')) ;
       // $inputs = $request->all();
  
	    $rule=array(
            'name' => 'required',
            'district_id' => 'required'
            );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        } 
          
        $upazila=new Upazila;
        $upazila->name = $request->name;
        $upazila->district_id = $request->district_id;		 

		//dd($upazila);
	    $upazila->save();
		
        \Session::flash('flash_message', trans('words.added'));
        return \Redirect::back();	         
    }     


    public function edit($id){ 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));
            return redirect('admin/dashboard'); 
        }
          $upazila = Upazila::find($id);
        return view('admin.pages.location.upazilas.edit')->with('upazila',$upazila);

    }

    public function update(Request $request, $id)    
    {     
    	  if(Auth::User()->usertype!="Admin"){
            \Session::flash('flash_message', trans('words.access_denied'));
            return redirect('admin/dashboard');
        }		
    		     
          $upazila  = Upazila::findOrFail($id);
          $upazila->name=$request->name;
          $upazila->district_id=$request->district_id;
          $upazila->save();
          
          \Session::flash('flash_message', trans('words.successfully_updated'));
          return \Redirect::back();
        
    }	 
    
    public function delete($id)
    {
    	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
        $upazila = Upazila::findOrFail($id);         
		$upazila->delete();
		
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }
      
    	
}
