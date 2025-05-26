<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Enquire;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;


class InquiriesController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function inquirieslist()
    {  
    	if(Auth::User()->usertype!="Admin"){

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
            }
             
		$inquirieslist = Enquire::orderBy('id','desc')->paginate(10);
		 
        return view('admin.pages.inquiries',compact('inquirieslist'));
    } 
    
    public function addNew(){

        $allstaff=User::where('status',1)->get();
        return view('admin.pages.inquiries.create')->with('allstaff',$allstaff);
    }

    
	public function store(Request $request)
    {	
    	$data =  \Request::except(array('_token')) ;  
    
	    $rule=array(
            'name' => 'required',
            'email' => 'required',
           // 'phone' => 'required|numeric|max:11|min:11',
        );
    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()) {       
        \Session::flash('flash_message_agent', 'name,email and message field are required');    
        return redirect()->back()->withErrors($validator->messages());} 
    	
    	$enquire = new Enquire;
    	$enquire->verify_user_id =Auth::User()->id;
    	$enquire->name = $request->get('name');
    	$enquire->email = $request->get('email');
        $enquire->phone = $request->get('phone');

        $enquire->property_size_form = $request->get('property_size_form');
        $enquire->property_size_to = $request->get('property_size_to');
        $enquire->property_location = implode(',',$request->property_location);
        $enquire->property_status = $request->get('property_status');
        $enquire->budget = $request->get('budget');
        $enquire->facing = $request->get('facing');
        $enquire->floor_position = $request->get('floor_position');
        $enquire->facing = $request->get('facing');
        $enquire->special_note = $request->get('special_note');

        $enquire->reffered_by = $request->get('reffered_by');
        $enquire->refer_person_name = $request->get('refer_person_name');
        $enquire->refer_person_phone = $request->get('refer_person_phone');
        $enquire->refer_person_address = $request->get('refer_person_address');
        $enquire->relation = $request->get('relation');



        $enquire->lead_source = $request->get('lead_source');
        $enquire->verify = 1;
        $enquire->verify_date = date('Y/m/d H:i:s');

      // dd($enquire);
	    $enquire->save();
	    
	    Session::flash('success', 'Message send successfully');
        return redirect()->back();
    }

    public function edit($id){
        $allstaff=User::where('status',1)->get();
        $inquiries = Enquire::find($id);
        return view('admin.pages.inquiries.edit')->with('allstaff',$allstaff)->with('inquiries',$inquiries);
    }

    public function update(Request $request, $id)
    {	
    	$data =  \Request::except(array('_token')) ;  
    
	    $rule=array(
            'name' => 'required',
            'email' => 'required',
           // 'phone' => 'required|numeric|max:11|min:11',
        );
    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()) {       
        \Session::flash('flash_message_agent', 'name,email and message field are required');    
        return redirect()->back()->withErrors($validator->messages());} 

        $enquire = Enquire::findOrFail($id);

        $enquire->verify_user_id = Auth::User()->id;
    	$enquire->name = $request->get('name');
    	$enquire->email = $request->get('email');
        $enquire->phone = $request->get('phone');

        $enquire->property_size_form = $request->get('property_size_form');
        $enquire->property_size_to = $request->get('property_size_to');
        $enquire->property_location = implode(',',$request->property_location);
        $enquire->property_status = $request->get('property_status');
        $enquire->budget = $request->get('budget');
        $enquire->facing = $request->get('facing');
        $enquire->floor_position = $request->get('floor_position');
        $enquire->facing = $request->get('facing');
        $enquire->special_note = $request->get('special_note');

        $enquire->reffered_by = $request->get('reffered_by');
        $enquire->refer_person_name = $request->get('refer_person_name');
        $enquire->refer_person_phone = $request->get('refer_person_phone');
        $enquire->refer_person_address = $request->get('refer_person_address');
        $enquire->relation = $request->get('relation');

        $enquire->lead_source = $request->get('lead_source');
        $enquire->verify = 1;
        $enquire->verify_date = date('Y-m-d H:i:s');

       // dd($enquire);

	    $enquire->save();
	    
	    Session::flash('success', 'Enquiry Updated Successfully');
        return redirect()->back();
    }

    public function inquiriesDetails($id){

        $inquiries = Enquire::find($id);

   
       if($inquiries->verify_user_id !=null || $inquiries->reffered_by !=null){

            $verify_user = User::find($inquiries->verify_user_id);
            $reffer_user = User::find($inquiries->reffered_by);

            return view('admin.pages.inquiries.view',compact('inquiries','verify_user','reffer_user'));  

        } else {
            return view('admin.pages.inquiries.view',compact('inquiries'));
        } 
            

    }


    
    public function delete($id)
    {
    	$decrypted_id = Crypt::decryptString($id);

        $inquire = Enquire::findOrFail($decrypted_id);
         
		 
		$inquire->delete();
		
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }
      
    	
}
