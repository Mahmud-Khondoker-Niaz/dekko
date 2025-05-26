<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\ClientRequest;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str; 

class ClientRequestController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		 parent::__construct();
    }

    public function requestlist()
    {  
        
         if(Auth::User()->usertype!="Admin"){

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
            }
        
    	$requestlist = ClientRequest::orderBy('id','desc')->paginate(10);
		  
        return view('admin.pages.client_request',compact('requestlist'));
    } 

	 
    public function delete($id)
    {
    	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
    	
        //$decrypted_id = Crypt::decryptString($id); 

        $data = ClientRequest::findOrFail($id);
         
		 
		$data->delete();
		
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }
      
    	
}
