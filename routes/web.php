<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::group(['middleware' => ['auth']], function () { 

    Route::group(['as' => 'admin.', 'prefix'=>'admin' ,'middleware'=> 'admin'],function(){
        Route::get('/profile','Admin\ProfileController@index')->name('profile');
    });

    Route::group(['as' => 'user.' ,'prefix'=>'user' ,'middleware'=>'user'],function(){
        Route::get('/profile','User\ProfileController@index')->name('profile');
    });

    Route::resource('/post', 'PostController');
    Route::resource('/comments', 'CommentsController');
    Route::resource('/user', 'UserController');

});