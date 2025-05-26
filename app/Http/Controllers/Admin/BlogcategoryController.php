<?php

namespace App\Http\Controllers\Admin;

use App\Blogcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class BlogcategoryController extends MainAdminController
{
    public function index()
    {
 
        return view('admin.blogcats.index')->with('blogcategories',Blogcategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogcats.create');
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

        $category = Blogcategory::create(array(
            'name' => $request->name,
            'slug'=>Str::slug($request->name),
        ));

        Session::flash('success','Category Created successfully');
        $category->save();
        return redirect()->route('blog-categories');
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
        $category = Blogcategory::find($id);

        return view('admin.blogcats.edit')->with('blogcategory',$category);
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

        $category = Blogcategory::find($id);
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->save();
        Session::flash('success','Category update successfully');
        return redirect()->route('blog-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Blogcategory::find($id);

//        foreach($category->blogs as $blog){
//            //$blog->forceDelete();
//            $blog->delete();
//        }

        $category->delete();
        Session::flash('success','Category Deleted successfully');
        return redirect()->route('blog-categories');
    }
}
