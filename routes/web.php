<?php

use Illuminate\Support\Facades\Cache;
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

Route::get('/','PageController@root')->name('root');

//Route::get('/admin/login', function () {
//    return view('Admin/login');,'middleware'=>['auth']

//});
/*Route::group(['prefix'=>'admin'],function(){
    Route::get('login','Admin\LoginController@index');

    // Route::group(['middleware'=>['Role']],function (){
       Route::get('index','Admin\AdminController@index');
    // });
});*/

