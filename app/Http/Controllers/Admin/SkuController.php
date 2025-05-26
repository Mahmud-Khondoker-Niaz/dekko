<?php

namespace App\Http\Controllers\Admin;
use App\Productsbrand;
use App\Sku;

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

class SkuController extends MainAdminController
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
        return view('admin.skus.index')->with('skus',Sku::all())->with('brands',Productsbrand::all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.skus.sku-post')->with('brands',Productsbrand::all());
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
            'name'=>'required',

            'image' => 'mimes:jpg,jpeg,gif,png',
            'description' => 'required',
            'productsbrand_id' => 'required',
            //'tags' => 'required',
        ]);
		
		$user_id=Auth::user()->id;
		
		
		$image = $request->image;
		$image_new_name = time().$image->getClientOriginalName();
        
		$image->move('public/upload/skus', $image_new_name);
			
		$sku = sku::create(array(
			
			'name' => $request->name,
			'description' => $request->description,
			'image' => 'public/upload/skus/' . $image_new_name,
			'productsbrand_id' => $request->productsbrand_id,
			'slug' => Str::slug($request->title),
			'weight' => $request->weight,
		));
			
       
        $sku->save();

       
         
         
        
        Session::flash('success','Your sku added Successfully.');
        return redirect()->route('skus');
    }

    

    public function show(sku $sku)
    {
        //
    }


    public function edit($id)
    {
    if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $sku= Sku::find($id);
        return view('admin.skus.edit')->with('sku',$sku)
            ->with('brands',Productsbrand::all());
    }


    public function update(Request $request, $id)
    {

    if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

     

        $sku= Sku::find($id);

        if($request->hasfile('image')){
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('public/upload/skus', $image_new_name);
            $sku->image ='/public/upload/skus/'.$image_new_name;
        }


        $sku->name=$request->name;  
        $sku->description =$request->description;
        $sku->weight =$request->weight;
        $sku->productsbrand_id =$request->productsbrand_id;
        $sku->slug = Str::slug($request->title);
       
//dd($sku->user_id);

        $sku->save();
      

        Session::flash('flash_message', 'Sku updated successfully!');
        return redirect()->route('skus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sku  $sku
     * @return \Illuminate\Http\Response
     */

   
        public function destroy($id)
        {
            $sku = SKU::find($id);
            if ($sku  != null) {
                $sku ->delete();
                return redirect()->route('skus');
            }
        
          
            Session::flash('success','Sku Deleted successfully');
            return redirect()->route('skus');
        }
    

    public function trashed()
    {
        $sku = Sku::onlyTrashed()->get();

        return view('admin.skus.trashed')->with('sku',$sku);
    }

    public function kill($id)
    {
        $sku = Sku::withTrashed()->where('id',$id)->first();

        $sku->forceDelete();
        Session::flash('success', 'Post deleted permanently');
        return redirect()->back();

    }

    public function restore($id)
    {
        $sku = Sku::withTrashed()->where('id',$id)->first();

        $sku->restore();
        Session::flash('success', 'Post Restore Successfully');
        return redirect()->route('skus');

    }

}
