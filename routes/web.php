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
        return view('list');
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
/*Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
Route::get('success', [
    'middleware' => 'auth',
    function () {
	return redirect('list');
    }
]);




Route::resource('login','LoginController');
*/
Route::resource('users','UsersController');
#Route::resource('account','AccountController');

Route::resource('fix_account','FixAccountController');

Route::get('account/{account}/delete',
	['as' => 'account.destroy', 'uses' => 'AccountController@destroy']);
