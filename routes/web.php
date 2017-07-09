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

Route::get('/', function () {
	return view('users.login');
});

//auth를 사용하기위한 routes
Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('list', function () {
        return view('account.list');
    });
});
Route::middleware('guest')->group(function () {
    Route::get('/', function() {
        return view('users.login');
    });
});
Route::group(['middleware' => 'auth'], function() {
  Route::resource('account', 'AccountController');
});
Route::get('list','AccountController@index');
Route::get('logout',function(){
        auth()->logout();
	Session::flash('flash_message','logout success');
	return redirect('/');
});

Route::resource('users','UsersController');
Route::resource('fix_account','FixAccountController');

Route::get('account/{account}/delete',
	['as' => 'account.destroy', 'uses' => 'AccountController@destroy']);

/* Socialite */
Route::get('social/github', 'Auth\LoginController@redirectToProvider');
Route::get('social/github/callback', 'Auth\LoginController@handleProviderCallback');
