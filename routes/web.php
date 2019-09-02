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

Route::get('/{group}/{id}/{sourceId?}', 'GroupController@presentThemes')
    ->where(['group' => '[a-z]+', 'id' => '[2-4]', 'source_id' => '[0-9]+']);

Route::group(['middleware' => 'guest'], function () {

    Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');

});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/get/courses', 'HtmlGenerateController@ajaxGetCoursesForGroup');
    Route::group(['prefix' => 'panel'], function () {
        Route::get('/', 'AccountController@index')->name('account');
        Route::get('/create/theme', 'GroupController@viewBlankCreateTheme');
        Route::post('/create/theme', 'GroupController@actionCreateTheme')->name('create_theme');
        Route::group(['prefix' => 'action'], function () {
            Route::get('/{id}', 'AccountController@view');
            Route::post('/{id}', 'AccountController@edit');
            Route::delete('/{id}', 'AccountController@delete');
        });

    });

    Route::get('logout', function () {
        Auth::logout();
        return redirect(url('/'));
    });

});
