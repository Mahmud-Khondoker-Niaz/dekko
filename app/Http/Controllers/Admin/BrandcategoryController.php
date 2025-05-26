<?php

namespace App\Http\Controllers\Admin;

use App\Brandcategory;
use App\Productscategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class BrandcategoryController extends MainAdminController
{
    public function index()
    {
 
        return view('admin.brandcats.index')->with('brandcategories',Brandcategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brandcats.create')->with('categories',Productscategory::all());
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
        ]);

        $category = Brandcategory::create(array(
            'productscategory_id' => $request->productscategory_id,
            'name' => $request->name,
            'slug'=>Str::slug($request->name),
        ));

        Session::flash('success','Category Created successfully');
        $category->save();
        return redirect()->route('brand-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Brandcategory::find($id);

        return view('admin.brandcats.edit')->with('brandcategory',$category)->with('categories',Productscategory::all());
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

        $category = Brandcategory::find($id);
        $category->productscategory_id=$request->productscategory_id;
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->save();
        Session::flash('success','Sub-Category update successfully');
        return redirect()->route('brand-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Brandcategory::find($id);

//        foreach($category->blogs as $blog){
//            //$blog->forceDelete();
//            $blog->delete();
//        }

        $category->delete();
        Session::flash('success','Category Deleted successfully');
        return redirect()->route('brand-categories');
    }
}
