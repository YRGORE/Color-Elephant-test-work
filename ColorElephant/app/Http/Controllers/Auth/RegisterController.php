<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Log;
use Image;
use Session;
use File;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/logout';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //log::info($data);
        
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'cover_letter'=> 'required|string|min:10',
          //  'resume_url'=>'required',

    'g-recaptcha-response' => 'required|captcha'

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      /* if ($data->hasFile('resume')){

        $file = $data->file('resume');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path() . '/Allresume/';
        $file->move($destinationPath, $filename);
       
       }*/
            //$fileName=uniqid().$data->get('resume_url')->getClientOriginalName() . '.' . $data->get('resume_url')->getClientOriginalExtension();
            //$data->get('resume_url')->move(public_path('Allresume') . $fileName);
        //get the file
      /*  $file = $data->file('resume_url');

//create a file path
        $path = 'Allresume/';

//get the file name
        $file_name = $file->getClientOriginalName();

//save the file to your path
        $file->move($path , $file_name); //( the file path , Name of the file)

//save that to your database
        
        $new_file->file_path = $path . $file_name;
        //$new_file->save();

      // log::info($new_file);
      */
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'cover_letter' => $data['cover_letter'],
            //'resume_url' => $new_file,
            'visibleTo' => $data['visibleTo']            
        ]);
    }
}
