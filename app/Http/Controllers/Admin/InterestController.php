<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Interest;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class InterestController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');			
		 parent::__construct();
         
    }
 
    public function interestlist()
    {  
    	if(Auth::User()->usertype!="Admin"){
            \Session::flash('flash_message', trans('words.access_denied'));
            return redirect('dashboard');
        }    
		$interestlist = Interest::orderBy('id','desc')->paginate(10);
        return view('admin.pages.interests',compact('interestlist'));
    } 
     
    public function status($id)
    { 	
    	$decrypted_id = Crypt::decryptString($id);

        $statusdata = Interest::findOrFail($decrypted_id);
       
       	if(Auth::User()->id!=$statusdata->agent_id and Auth::User()->usertype!="Admin")
       	{

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
       
		if($statusdata->status==1)
		{
			$statusdata->status='0';		 
	   		$statusdata->save();
	   		
	   		\Session::flash('flash_message', trans('words.unpublish'));
		}
		else
		{
			$statusdata->status='1';		 
	   		$statusdata->save();
	   		
	   		\Session::flash('flash_message', trans('words.published'));
		}
		 
        return redirect()->back();

    }

    
    public function delete($id)
    {
    	$decrypted_id = Crypt::decryptString($id);

        $inquire = Interest::findOrFail($decrypted_id);
         
		 
		$inquire->delete();
		
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }
      
    	
}
