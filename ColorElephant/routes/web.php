<?php
//use Illuminate\Support\Facades\Log;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('home', function () {
    return view('main');
});
*/
/*Route::get('/search_user/{user}', function ($user) {
	log::info($user);
    return \App\User::find(Auth::user()->id)->search_user($user);
})->name('search_user');
*/
/*Route::get('/search_user/{user}', function ($user) {
    return \App\User::where('name', 'like', "$user%")->orWhere('email', 'like', "$user%")->search_user($user);
})->name('search_user');
*/
//Route::resource('comment', 'CommentController');

/*Route::post('/comment', [
    'uses' => 'CommentController@postCommentPost',
    'as' => 'comment',
    'middleware' => 'auth'
]);
*/



Route::get('review','ReviewController@myReview');

Route::get('comment','CommentController@postCommentPost');

Route::post('showprofile','ProfileController@showProfile');

Route::get('search_user/{user}', 'SearchController@getSearch');

Route::get('home', function () {
    return view('pages/home');
});

Route::get('myhome', [
    'uses' => 'HomeController@getHome',
    'as' => 'myhome',
    'middleware' => 'auth'
]);

Route::post('myresume','UploadController@getResume');

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::get('register', '\App\Http\Controllers\Auth\');
//Route::post('register', '\App\Http\Controllers\Auth\RegisterController@create');

