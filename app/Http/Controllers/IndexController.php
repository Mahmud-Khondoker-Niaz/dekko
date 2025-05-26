<?php
namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Team;
use App\Gallery;
use App\Project;
use App\Legal;
use App\Travel;
use App\It;

use App\Blog;
use App\Blogcategory;

use Mail;
use Image;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str; 
use Validator;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
 
class IndexController extends Controller
{
    public function __construct()
    {
         check_property_exp(); 
    }

   public function index()
    {   

        $projects = Project::get();

                $legals = Legal::get();
                $travels = Travel::get();
                $its = It::get();

       
                               
        return view('pages.index',compact('legals','travels','its','projects'));
    }

   
    
    
    public function aboutus_page()
    {                      
        return view('pages.about');
    }

    public function pricing_plan()
    {                      
        return view('pages.pricing_plan');
    }
     
    public function contact_us_page()
    {                       
        return view('pages.contact');
    }
     /*blog*/
    public function blog(){
     
        $blogs=Blog::where('status',1)->orderBy('created_at', 'desc')->paginate(4);
        return view('blogs.blogs')->with('blogs',$blogs)
            ->with('allcategories',Blogcategory::all())
            ->with('all_post',Blog::take(20)->get());
    }

    public function singleBlog($id){
        $blog= Blog::where('id', $id)->first();
        $next_id=Blog::where('id','>', $blog->id)->min('id');
        $prev_id=Blog::where('id','<', $blog->id)->max('id');
        $categories=Blogcategory::all();
        $related=Blog::where('blogcategory_id', '=', $blog->blogcategory->id)->where('id', '!=', $blog->id)->get();
            return view('blogs.single-blog')->with('blog',$blog)
            ->with('title', $blog->title)
            ->with('categories', Blogcategory::all())
            //->with('settings',Setting::first())
            ->with('next',Blog::find($next_id))
            ->with('prev',Blog::find($prev_id))
            ->withRelated($related);
            
    }

    public function blogcategory($slug){
 
        $blog_category= Blogcategory::where('slug', $slug)->first();
        return view('blogs.blog-category')->with('blog_category',$blog_category)
            ->with('title', $blog_category->name)
            ->with('all_blog_categories', Blogcategory::all());
    }

    /*blog end*/
     /*Team*/
   public function team(){
     
       
        $teams = Team::where('status','1')->orderBy('id', 'asc')->paginate(getcong('pagination_limit')); 
        return view('pages.teams',compact('teams')); 
    }
    Public function team_details($id){
        $teams = Team::find($id);
        return view('pages.teams_single',compact('teams',$teams)); 

    }
        /*End Team*/








      Public function project(){
           
                $project= Project::all(); 

            
            return view('pages.project_details',compact('project',$project)); 
    
        }
        
        Public function travel(){
           
            $travel= Travel::all(); 

        
        return view('pages.travel_details',compact('travel',$travel)); 

    }
    Public function legal(){
           
        $legal= Legal::all(); 

    
    return view('pages.legal_details',compact('legal',$legal)); 

}
Public function technology(){
           
    $technology= It::all(); 


return view('pages.technology_details',compact('technology',$technology)); 

}











         /*Team*/
    public function gallery(){
     
    	$galleries = Gallery::where('status','1')->orderBy('id', 'desc')->paginate(getcong('pagination_limit')); 
        return view('pages.gallery',compact('galleries'));    
    }
        /*End Team*/
    
    public function contact_us_sendemail(Request $request)
    {   
        
        $data =  \Request::except(array('_token')) ;
        
        $inputs = $request->all();
        
        $rule=array(
                'name' => 'required',
                'email' => 'required|email',
                'your_message' => 'required' 
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages())->withInput();
        } 
        
        
        $data_email = array(
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'phone' => $inputs['phone'],
                'website' => $inputs['website'],
                'your_message' => $inputs['your_message']
                );    
        if(getenv("MAIL_USERNAME"))
        {
            \Mail::send('emails.contact', $data_email, function($message) use ($inputs){
                    $message->to(getcong('contact_us_email'), getcong('site_name'))
                    ->from(getcong('site_email'), getcong('site_name'))
                    ->subject(getcong('site_name').' Contact');
            });
        }

         \Session::flash('flash_message_contact', trans('words.thanks_for_contacting_us'));

         return \Redirect::back();
    }
    
    
    /**
     * Do user login
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login()
    {   
        if (Auth::check()) {
                        
            return redirect('dashboard'); 
        }
 
        return view('pages.login');
    } 
     
     
    public function postLogin(Request $request)
    {
        
    //echo bcrypt('123456');
    //exit; 
    if(getcong('recaptcha')==1)
    {   
      $this->validate($request, [
            'email' => 'required|email', 'password' => 'required','g-recaptcha-response' => 'required|captcha' 
        ]);
    }
    else
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required'
        ]);
    }

        $credentials = $request->only('email', 'password');

         
        
         if (Auth::attempt($credentials, $request->has('remember'))) {

            if(Auth::user()->status=='0'){
                \Auth::logout();   

                \Session::flash('login_error_flash_msg', 'Required');               
                return redirect('/login')->withErrors(trans('words.account_not_activated_msg'));
            }

            return $this->handleUserWasAuthenticated($request);
        }

       // return array("errors" => 'The email or the password is invalid. Please try again.');
        //return redirect('/admin');

       \Session::flash('login_error_flash_msg', 'Required'); 
       return redirect('/login')->withErrors(trans('words.email_password_invalid'));
        
    }
    
     /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $throttles
     * @return \Illuminate\Http\Response
     */
    protected function handleUserWasAuthenticated(Request $request)
    {

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }

        return redirect('/dashboard'); 
    }
    
  
    public function logout()
    {
        Auth::logout();

        //return redirect('admin/');
        return redirect('/');
    }
    
    


   
    
}