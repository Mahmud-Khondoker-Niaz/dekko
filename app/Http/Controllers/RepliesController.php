<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Reply;
use \App\Comment;


class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$comment_id)
    {
        $this->validate($request,[

            'reply'=>'required',
           

        ]);
            $comment=Comment::find($comment_id);
            $reply=new Reply();
            $reply->reply=$request->reply;
           
            $reply->comment()->associate($comment);
            $reply->save();
            session()->flash('success', 'Reply submitted successfully');

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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $reply = Reply::find($id);

       // $reply->delete();
       // session()->flash('success', 'Reply deleted successfully');
       // return redirect()->back();
    }
}
