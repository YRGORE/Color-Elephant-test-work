<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use App\User;
use App\Comment;
use App\Review;
use Image;
use Session;


class ReviewController extends Controller
{
	public function myReview(Request $request){

		$rating = $request['rating'];
		$currentuser = $request['currentuser'];
		$reviewer = $request['reviewer'];

		$review = new Review;
		$review->user_id = $currentuser;
		$review->review_user_id = $reviewer;
		$review->rating = $rating;

		//log::info($rating);
		$review->save();

		return response()->json([ 'status' => 1 ],200);

	}
}