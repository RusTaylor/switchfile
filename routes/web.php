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
    ->where(['group' => '[a-z]+', 'id' => '[1-4]', 'source_id' => '[0-9]+']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
});

Route::group(['prefix' => 'api'], function () {
    Route::post('get/courses', 'HtmlGenerateController@ajaxGetCoursesForGroup');
    Route::post('get/lessons', 'HtmlGenerateController@ajaxGetLessonsForGroupCourse');
});

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'panel'], function () {
        Route::get('/', 'AccountController@index')->name('account');
        Route::get('/create/theme', 'GroupController@viewBlankCreateTheme');
        Route::post('/create/theme', 'GroupController@actionCreateTheme')->name('create_theme');
        Route::get('/edit/{themeId}', 'AccountController@editTheme');

        Route::group(['prefix' => 'api'], function () {
            Route::post('/getAllGroups', 'ApiAccountController@getAllGroups');
            Route::post('/getCourses', 'ApiAccountController@getCoursesForGroup');
            Route::post('/getLessons', 'ApiAccountController@getLessons');
            Route::post('/getFileData', 'ApiAccountController@getFileData');
            Route::post('/saveFileChanges', 'ApiAccountController@saveFileChanges');
            Route::post('/getFiles', 'ApiAccountController@getFiles');
            Route::post('/saveThemeChanges', 'ApiAccountController@saveThemeChanges');
            Route::post('/deleteFile', 'ApiAccountController@deleteFile');
            Route::post('/deleteTheme', 'ApiAccountController@deleteTheme');
        });
    });

    Route::get('logout', function () {
        Auth::logout();
        return redirect(url('/'));
    });

});
