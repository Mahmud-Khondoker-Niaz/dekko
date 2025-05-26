<?php

namespace App\Http\Controllers\Admin;

use App\Productsbrand;
use App\Productscategory;
use App\Brandcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class ProductsbrandController extends MainAdminController
{
    public function index()
    {
 
        return view('admin.productsbrands.index')->with('productsbrands',Productsbrand::all())->with('categories',Productscategory::all())->with('brandcategories',Brandcategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productsbrands.create')->with('categories',Productscategory::all())->with('brandcategories',Brandcategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'image' => 'mimes:jpg,jpeg,gif,png',
            'productscategory_id'=>'required'
        ]);

        $image = $request->image;
		$image_new_name = time().$image->getClientOriginalName();
		$image->move('public/upload/brands', $image_new_name);
        

        $feature = $request->feature;
		$feature_new_name = time().$feature->getClientOriginalName();
		$feature->move('public/upload/brands', $feature_new_name);

        $brandcategory_id = $request->input('brandcategory_id');
        if ($brandcategory_id == 0) {
            $brandcategory_id = null; // Assign null for brands without subcategory
        }
        $brand = Productsbrand::create([
            'productscategory_id' => $request->productscategory_id,
            'brandcategory_id' => $brandcategory_id,
            'name' => $request->name,
            'image' => 'public/upload/brands/' . $image_new_name,
            'feature' => 'public/upload/brands/' . $feature_new_name,
            'description'=>$request->description,
            'slug'=>Str::slug($request->name),
        ]);

        Session::flash('success','brand Created successfully');
        $brand->save();
        return redirect()->route('products-brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productsbrand = Productsbrand::find($id);

        return view('admin.productsbrands.edit')->with('productsbrand',$productsbrand)->with('categories',Productscategory::all())->with('brandcategories',Brandcategory::all());
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name'=>'required',
        ]);

        $brand = Productsbrand::find($id);

        if($request->hasfile('image')){
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('public/upload/brands', $image_new_name);
            $brand->image ='/public/upload/brands/'.$image_new_name;
        }
        if($request->hasfile('feature')){
            $feature = $request->feature;
            $feature_new_name = time().$feature->getClientOriginalName();
            $feature->move('public/upload/brands', $feature_new_name);
            $brand->feature ='/public/upload/brands/'.$feature_new_name;
        }

        $brand->name=$request->name;
        $brand->description=$request->description;
        $brand->productscategory_id=$request->productscategory_id;
        $brand->brandcategory_id=$request->brandcategory_id;
       $brand->slug=Str::slug($request->name);
        $brand->save();
        Session::flash('success','brand update successfully');
        return redirect()->route('products-brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Productsbrand::find($id);
        $brand->delete();
        Session::flash('success','brand Deleted successfully');
        return redirect()->route('products-brands');
    }
}
