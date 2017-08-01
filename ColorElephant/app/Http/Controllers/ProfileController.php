<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Comment;
use App\Review;
use Image;
use Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }

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
       // return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function showProfile(Request $request){
    	$name =$request->input('search_friends');
    	
    	$userdetail = User::where('name',$name)->first();
    	$profileUserid= $userdetail->id;

    	$comment = Comment::where('user_id','=',$profileUserid)->orderBy('created_at', 'desc')->get();
    	$mainuser = Auth::user()->id;
    	//log::info($userdetail->id);
    	//log::info($comment->user_id);
    	//log::info($mainuser);
    	$isreview = Review::where('user_id','=',$profileUserid)->where('review_user_id','=',$mainuser)->first();

    	$fiveStar = Review::where('rating','=','5')->orderBy('created_at', 'desc')->get();

    	//log::info($fiveStar->id);
    	if($isreview){
    		$status=1;
    		
    	}
    	else{
    		$status=0;
    	}

    	//log::info($comment);
       //return redirect()->route('home')->withPost($post); 	
      return view('profile.show',['userdetail' => $userdetail, 'mainuser' => $mainuser, 'comment' => $comment, 'status' => $status, 'myrating' => $isreview , 'fiveStar' => $fiveStar]);       
    }

     public function store(Request $request)
    {

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

     public function edit($id)
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
        //
    }

}
