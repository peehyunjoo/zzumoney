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
	return view('welcome');
});

Route::get('success', [
    'middleware' => 'auth',
    function () {
	return redirect('list');
    }
]);

Route::get('list',function(){
	return view('list');
});
Route::get('logout',function(){
        auth()->logout();
	Session::flash('flash_message','logout success');
	return redirect('login');
});
Route::resource('login','LoginController');
Route::resource('users','UsersController');
Route::resource('account','AccountController');
