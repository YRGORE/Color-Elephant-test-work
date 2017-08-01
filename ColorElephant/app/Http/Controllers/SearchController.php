<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Image;
use Session;

class SearchController extends Controller
{
	public function getSearch($data){
		//$name = $request;
		//log::info($data);
		$users=User::where('name','like',$data.'%')->orWhere('email','like',$data.'%') -> get();
		//$user_list = $this->getUserResponse($users);
		
		return response()->json($users);
	}
}	