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

//前端
Route::get('/','Home\IndexController@index');
Route::get('transmit/oneId/{oneId}/secId/{secId}','Home\IndexController@transmit');
Route::get('brand/oneId/{oneId}/secId/{secId}','Home\IndexController@brand');
Route::get('university/oneId/{oneId}/secId/{secId}','Home\IndexController@university');
Route::get('summit/oneId/{oneId}/secId/{secId}','Home\IndexController@summit');
Route::get('tutorStudent/oneId/{oneId}/secId/{secId}','Home\IndexController@tutorStudent');
Route::get('aboutUs/oneId/{oneId}/secId/{secId}','Home\IndexController@aboutUs');
Route::get('threeList/pid/{pid}/id/{id}','Home\IndexController@threeList');
Route::get('article/id/{id}','Home\IndexController@article');
Route::get('video/id/{id}','Home\IndexController@video');
Route::get('tutorStudent/detail/id/{id}','Home\IndexController@tsDetail');
Route::get('search','Home\IndexController@search');
Route::get('doSearch','Home\IndexController@doSearch');

//公共链接
Route::get('getHref/id/{id}','Home\IndexController@getHref');

//API
Route::get('getCategoryPage','Home\IndexController@getCategoryPage');
Route::get('upload','Home\IndexController@getCategoryPage');

//测试
Route::get('/test', function () {
   $abc = \App\Models\Admin::where('email','>','?')->toSql();
   dd(asset('123'));
   dd($abc);
})->middleware('role');

//后台
Route::group(['prefix'=>'admin'],function(){
    Route::get('index','Admin\IndexController@index');			//首页
    Route::get('home','Admin\IndexController@home');			//首页内容
    Route::get('login','Admin\IndexController@login');			//登陆界面
    Route::post('login','Admin\IndexController@store');			//执行登陆
   	Route::get('loginout','Admin\IndexController@loginOut');	//退出


    Route::resource('admin','Admin\AdminController');           //管理员
    Route::resource('category','Admin\CategoryController');     //分类
    Route::resource('navigation','Admin\NavigationController'); //导航
    Route::resource('label','Admin\LabelController');           //标签
    Route::resource('user','Admin\UserController');             //用户
    Route::resource('tutorStudent','Admin\TutorStudentController');  //导师学员
    Route::resource('video','Admin\VideoController');           //视频
    Route::resource('article','Admin\ArticleController');       //文章
    Route::resource('advertising','Admin\AdvertisingController');//广告
    Route::resource('hotbot','Admin\HotbotController');         //热搜

    //功能路由
    Route::get('choiceness/setting/type/{type}/id/{id}','Admin\ChoicenessController@setting');  //设置精选
    Route::get('choiceness/cancel/id/{id}','Admin\ChoicenessController@cancel');                //取消精选
    Route::get('tutorStudent/showIndex/id/{id}','Admin\TutorStudentController@showIndex');      //首页展示


});

//后台辅助功能
Route::get('/assist',function (){
    return view('layouts.assist');
});


