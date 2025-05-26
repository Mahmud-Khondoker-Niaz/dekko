<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment;
use \App\Blog;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
 
      
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$blog_id)
    {
        $this->validate($request,[

            'name'=>'required',
            'email'=>'required',
            'comment'=>'required'

        ]);
            $blog=Blog::find($blog_id);
            $comment=new Comment();
            $comment->name=$request->name;
            $comment->email=$request->email;
            $comment->comment=$request->comment;
            $comment->blog()->associate($blog);
            $comment->save();
            session()->flash('success', 'Comment submitted successfully');

            return redirect()->back();

           
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$comment = Comment::find($id);
//
       // $comment->delete();
       // session()->flash('success', 'Comment deleted successfully');
       // return redirect()->back();

    }
}
