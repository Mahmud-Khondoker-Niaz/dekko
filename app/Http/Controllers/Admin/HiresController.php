<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Hire;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class HiresController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }

    public function hireslist()
    {  

      
    	if(Auth::User()->usertype!="Admin"){

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
            }
             
		$hireslist = Hire::orderBy('id','desc')->paginate(10);
		 
        return view('admin.pages.hires',compact('hireslist'));
    } 
     
    public function status($id)
    { 	
    	$decrypted_id = Crypt::decryptString($id);

        $hiredate = Hire::findOrFail($decrypted_id);
       
       	if(Auth::User()->id!=$hiredate->seller_id and Auth::User()->usertype!="Admin")
       	{

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
       
		if($hiredate->status==1)
		{
			$hiredate->status='0';		 
	   		$hiredate->save();
	   		
	   		\Session::flash('flash_message', trans('words.unpublish'));
		}
		else
		{
			$hiredate->status='1';		 
	   		$hiredate->save();
	   		
	   		\Session::flash('flash_message', trans('words.published'));
		}
		 
        return redirect()->back();

    }

    
    public function delete($id)
    {
    	$decrypted_id = Crypt::decryptString($id);

        $inquire = Hire::findOrFail($decrypted_id);
         
		 
		$inquire->delete();
		
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }
      
    	
}
