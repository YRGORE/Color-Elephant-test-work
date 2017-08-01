<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Image;
use Session;


class CommentController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    public function postCommentPost(Request $request)
    {
        $this->validate($request, array(
            'my_comment'   =>  'required|min:1|max:200'
            ));

        $commentTo = $request['commentTo'];
        $commentFrom = $request['commentFrom'];
        $my_comment=$request['my_comment'];
       
        $comment = new Comment();
        $mainuser = Auth::user()->name;
        $comment->user_id = $commentTo;
        $comment->comment_body = $my_comment;
        $comment->comment_user_id = $commentFrom;
       // log::info($commentFrom);
        $comment->save();
        return response()->json([
            'commentTo'=> $comment->user_id,
            'commentFrom'=> $comment->comment_user_id,            
            'user_name'=> $mainuser,
            'created_at'=>$comment->created_at,
            'comment_body'=>$comment->comment_body,
            'commentId' => $comment->id
            ],200);
        
        
                    
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
        //
    }
}
