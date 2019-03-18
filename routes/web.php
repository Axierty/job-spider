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


// Route::get('/index', function () {
//     return view('welcome');
// });

Route::get('/indexs', 'Index\IndexController@index');

Route::get('/maopao', 'Index\SortController@maopao');
Route::get('/twoSearch', 'Index\SortController@twoSearch');
Route::get('/quick', 'Index\SortController@quick');


Route::get('/xunsou', 'Index\XunsouController@home');
Route::get('/xunsoutest', 'Index\XunsouController@test');


Route::get('/qcSpider','Spider\JobController@qcSpider');
Route::get('/zlSpider','Spider\JobController@zlSpider');

// 统计首页
Route::get('/spider','Spider\IndexController@index');



Route::get('/index/test/index', 'Index\TestController@index');
Route::get('/index/test/index2', 'Index\TestController@index2');


//日志组件路由
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
