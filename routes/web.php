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

Route::middleware('visitors')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->group(function() {
    Route::prefix('dashboard')->group(function () {

        ##Dashboard
        Route::get('/', 'DashboardController@index');
        ##Blog
        Route::resource('blogs', 'BlogController', ['except' => ['show']]);
        ##Blog Categories
        Route::resource('blogcategs', 'BlogCategoryController', ['except' => ['create', 'show', 'edit']]);
        ##Blog Categories
        Route::resource('services', 'ServiceController', ['except' => ['show']]);




        ##Profile
        Route::get('profile', 'UserController@index');
        Route::put('profileupd', 'UserController@profileupd');
        Route::put('passupd', 'UserController@passupd');

        ##Add Users
        Route::get('users', 'UserController@create');
        Route::post('adduser', 'UserController@store');
        Route::put('userupd/{id}', 'UserController@update');
        ##Visitors
        Route::get('visitors', 'VisitorsController@index');
        ##Settings
        Route::get('settings', 'SettingController@index');
        Route::post('settings', 'SettingController@store');

    });
});
