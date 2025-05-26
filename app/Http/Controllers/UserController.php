<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Properties;
use App\Testimonials;
use App\Subscriber;
use App\Enquire;
use App\Partners;
use App\SubscriptionPlan;
use App\Transactions;

use Mail;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Session;

class UserController extends Controller
{
	public function __construct()
    {
         $this->middleware('auth');          
    }
      
	public function dashboard()
    {   
        if(!Auth::user())
         {
            \Session::flash('flash_message', trans('words.login_required'));

            return redirect('login');
         }

        if(Auth::user()->usertype=='Admin')
        {
            return redirect('admin/dashboard');
        }

        $user_id=Auth::user()->id; 
             
        $properties_count = Properties::where(['user_id' => $user_id])->count();

        $pending_properties_count = Properties::where(['user_id' => $user_id,'status' => 0])->count();
        
        //$inquiries = Enquire::where(['agent_id' => $user_id])->count();
        $inquiries = Enquire::where(['user_id' => $user_id])->count();

        return view('pages.dashboard',compact('properties_count','pending_properties_count','inquiries'));
    }

    public function inquirieslist()
    {  
        if(Auth::user()->usertype=='Admin')
        {
            return redirect('admin/dashboard');
        }

        $user_id=Auth::user()->id;
        
        $inquiries_list = Enquire::where('user_id',$user_id)->orderBy('id')->paginate(8);
          
        return view('pages.inquiries_list',compact('inquiries_list'));
    } 
     
    
    public function delete($id)
    {   
        $decrypted_id = Crypt::decryptString($id);   

        $inquire = Enquire::findOrFail($decrypted_id);
         
         
        $inquire->delete();
        
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }

    public function profile()
    {  
        if(!Auth::user())
         {
            \Session::flash('flash_message', trans('words.login_required'));

            return redirect('login');
         } 

        if(Auth::user()->usertype=='Admin')
        {
            return redirect('admin/profile');
        } 

    	$user_id=Auth::user()->id;

        $user = User::findOrFail($user_id);
           
         return view('pages.profile',compact('user'));
    }

     public function profile_update(Request $request){  

    	$user_id=Auth::user()->id;
 			   
        $user = User::findOrFail($user_id);
 
	    
	    $data =  \Request::except(array('_token')) ;
	    
	    $rule=array(
		        'name' => 'required',
		        'email' => 'required|email|max:75|unique:users,id',
		        'profile_image' => 'mimes:jpg,jpeg,gif,png'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
	    

        //$inputs = $request->all();
        
        $profile_file = $request->file('profile_image');

        if($profile_file){
            \File::delete(public_path() .$user->profile_image);
            $tmpFilePath = public_path('upload/profile_image/');
            $hardPath = time().$profile_file->getClientOriginalName();
            $img = Image::make($profile_file);
            $img->fit(400, 400)->save($tmpFilePath.$hardPath); 
            $sav_profile_imagpath = '/upload/profile_image/' . $hardPath;
            $user->profile_image = $sav_profile_imagpath;
        }
        
		$user->name = $request['name']; 
		$user->email = $request['email']; 
		$user->phone = $request['phone'];
  		$user->about = $request['about'];
		$user->facebook = $request['facebook'];
		$user->twitter = $request['twitter'];
		$user->instagram = $request['instagram'];
		$user->linkedin = $request['linkedin'];
		
	    $user->save();

	    Session::flash('flash_message_profile', trans('words.successfully_updated'));

        return redirect()->back();
    }
    public function change_pass()
    {  
    	 if(!Auth::user())
         {
            \Session::flash('flash_message', trans('words.login_required'));

            return redirect('login');
         }
         
         if(Auth::user()->usertype=='Admin')
        {
            return redirect('admin/profile');
        }
          
         return view('pages.change_pass');
    }

    public function updatePassword(Request $request)
    { 
    	 
    		//$user = User::findOrFail(Auth::user()->id);
		
		
		    $data =  \Request::except(array('_token')) ;
            $rule  =  array(
                    'password'       => 'required|confirmed',
                    'password_confirmation'       => 'required'
                ) ;
 
            $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
		
	   		/* $val=$this->validate($request, [
                    'password' => 'required|confirmed',
            ]);  */      
         
	    $credentials = $request->only('password', 'password_confirmation'
            );
            
        $user = \Auth::user();
        $user->password = bcrypt($credentials['password']);
        $user->save();

	    Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    }

    public function plan_list($id)
    { 
       if(!Auth::check())
       {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('login');
            
        }

        $property_id = Crypt::decryptString($id);

        $property = Properties::findOrFail($property_id);

        Session::put('payment_property_name', $property->property_name);
      
        $subscription_plan = SubscriptionPlan::orderBy('id')->get();
         
        return view('pages.plan',compact('subscription_plan','property_id'));
    }


    public function plan_send(Request $request)
    { 
       $data =  \Request::except(array('_token')) ;
        
       $inputs = $request->all();

       $plan= SubscriptionPlan::getPlanInfo($inputs['plan_id']);
 
       $property = Properties::findOrFail($inputs['property_id']);


       if($plan->plan_price <=0)
       {

            $user_id=Auth::user()->id;           
            $user = User::findOrFail($user_id);

            $plan_id = $inputs['plan_id']; 
            $total_payment_amount=0;
            

            //SMS Send
            //send_payment_msg($user->phone,$user->name,$total_payment_amount,"success");
 
            $payment_trans = new Transactions;

            $payment_trans->property_id = $property->id;
            $payment_trans->email = $user->email;
            $payment_trans->user_id = $user_id;
            $payment_trans->plan_id = $plan_id;
            $payment_trans->gateway = 'none';
            $payment_trans->payment_amount = 0;
            $payment_trans->tax_amount = 0;
            $payment_trans->total_payment_amount = 0;
            $payment_trans->payment_id = 'none';
            $payment_trans->date = strtotime(date('m/d/Y'));
            
            $payment_trans->save();
           
            $property_obj = Properties::findOrFail($property->id);

            $property_days=$plan->plan_days;            
            $property_obj->active_plan_id = $plan_id;
            $property_obj->property_exp_date = strtotime(date('m/d/Y', strtotime("+".$plan->plan_days." days")));            
            ///$property_obj->status = 1;              
            $property_obj->save();

            \Session::flash('flash_message', trans('words.payment_success'));
            return redirect('my_properties');    
       }
       else
       {
            
            Session::put('payment_property_id', $property->id);
            Session::put('plan_id', $inputs['plan_id']);
            Session::put('plan_name', $plan->plan_name);
            Session::put('plan_price', $plan->plan_price);
            Session::put('plan_days', $plan->plan_days);

            Session::put('payment_method_name', $inputs['payment_method']);

            return redirect('plan_summary');
       }
  
    }

    public function plan_summary()
    {
        if(!Auth::check())
       {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('login');
            
        }

        $tax_amount=(Session::get('plan_price')*getcong('tax_percentage'))/100;

        $total_price=Session::get('plan_price')+$tax_amount;
 
        return view('pages.plan_summary',compact('tax_amount','total_price'));
    }
 
}