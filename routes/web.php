<?php

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
Auth::routes();

//ROUTE FOR IMAGE GALLERY
Route::get('gallery','FileController@gallery')->name('gallery.file');
Route::post('gallery','FileController@storeFile');

//ROUTE REGISTER & LOGIN
Route::get('/login','HomeController@login')->name('login');
Route::get('/register','HomeController@register')->name('register');

//Page
Route::get('/page','HomeController@page')->name('page');

//GOOGLE SOCIALITE
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//VERIFY EMAIL
Route::get('/verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');


//VOYAGER
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//LANDING PAGE
Route::get('/{post?}','HomeController@index')->name('welcome');


//VERIFY TOKEN
Route::get('/verify/{verify_token}','VerifyController@verify')->name('verify');


//EMAIL ACCOUNT VERIFIED
Route::get('/verified','VerifyController@verified')->name('verified');


//ROUTE FOR POST
Route::get('post/{post?}','Article\PostController@post')->name('post');

//COMMENTS
Route::post('comments/{post_id}', ['uses' => 'Article\CommentsController@store', 'as' => 'comments.store']);


Share::page('http://portalmedia.mtics.net', 'Blog Trends')
  ->facebook()
  ->twitter()
  ->googlePlus();


/*Route::get('/home{post?}','HomeController@index')->name('home');*/

/*Route::group(['middleware' => ['web','auth']], function(){
  Route::get('/home', function () {
      return view('home');
  });

  Route::get('/home', function() {
    if (Auth::user()->role_id == 1) {
      return view('admins');

    } else {
      return view('home');
    }
  });
});*/
