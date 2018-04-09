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
        Route::get('profile', 'UserController@profile');
        Route::put('profileupd', 'UserController@profileupd');
        Route::put('passupd', 'UserController@passupd');

        ##Add Users
        Route::resource('users', 'UserController', ['except' => ['show']]);

        ##Visitors
        Route::get('visitors', 'VisitorController@index');

        ##Settings
        Route::resource('settings', 'SettingController', ['except' => ['create', 'show', 'edit', 'update', 'destroy']]);

        ##Roles
        Route::resource('roles', 'RoleController', ['except' => ['show']]);
        Route::resource('permissions', 'PermController', ['except' => ['create', 'show', 'edit']]);

        ##Logs
        Route::get('logs', 'LogController@index');

        ##Clear cache
        Route::get('clearcache', 'DashboardController@cleanCache');

    });
});
