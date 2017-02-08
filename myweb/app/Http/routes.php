<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','AdminController@index');
Route::controller('/admin/user','UserController');
Route::controller('/admin/cate','CateController');
Route::controller('/admin/good','GoodsController');
Route::controller('/login','LoginController');
Route::controller('/admin/administrator','AdministratorController');
Route::controller('/sy','SyController');
Route::controller('/admin/orders','OrdersController');
