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


Route::get('/','Home\ShopController@list'); //商家信息

Route::get('/food','Home\FoodController@list'); //菜品信息

Route::get('/geren','Home\PersonalController@personal'); //个人中心


Route::get('/list/detail', 'Home\FoodController@index');

