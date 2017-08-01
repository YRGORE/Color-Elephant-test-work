<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Review;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Image;
use Session;

class UploadController extends Controller
{
	public function getResume(Request $request){
        Log::info("hii");
        if ($request->hasFile('cv')){

        $file = $request->file('cv');

        $filename = time() . '.' . $file->getClientOriginalExtension();
         log::info($filename);
        $destinationPath = public_path() . '/Allresume/';
        $file->move($destinationPath, $filename);
      //Redirect::to('myhome')->withMessage('Profile saved!');
        return response()->json(['message' =>'uploaded',200]);
       }
    }

}