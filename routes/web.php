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

Route::get('/', 'RouteController@index');


Route::get('account', 'RouteController@account')->name('get.account');
Route::post('signin', 'Auth\LoginController@postSignin')->name('post.signin');
Route::post('signup', 'Auth\RegisterController@postSignup')->name('post.signup');
Route::get('success/signup', 'RouteController@successSignup')->name('get.success.signup');
Route::get('success/payment', 'RouteController@successPayment')->name('get.success.payment');

Route::get('payment', 'RouteController@payment');

Route::get('add', 'TestPlusController@index')->name('get.test.add');
Route::post('add', 'TestPlusController@store')->name('post.test.add');

Route::group(['middleware' => 'web','auth'], function() {
    Route::get('logout', 'Auth\LoginController@logout')->name('get.logout');
    Route::get('boxs', 'MergeController@boxAll')->name('get.boxs');
    Route::get('box/{id}/{category}', 'MergeController@boxDetail')->name('get.detail.box');

});