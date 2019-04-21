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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'ksk'], function () {

    Route::get('/{id}/{source_id?}', 'GroupController@presentlibray')->where(['id' => '[2-4]', 'source_id' => '[0-9]+']);

});

Route::group(['prefix' => 'ra'], function () {

    Route::get('/{id}/{source_id?}', 'GroupController@presentlibray')->where(['id' => '[2-4]', 'source_id' => '[0-9]+']);

});

Route::group(['middleware' => 'guest'], function () {

    Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');

});

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'panel'], function () {
        Route::get('/', 'AccountController@index')->name('account');

    });

    Route::get('logout', function () {
        Auth::logout();
        return redirect(url('/'));
    });

});