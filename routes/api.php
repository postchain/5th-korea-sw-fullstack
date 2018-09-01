<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// 라스트 블록 가져오기
Route::get('last', 'BlockController@lastBlock');

/**
 * @param email
 * @param txHash
 * 사용자의 이메일을 트랜잭션 시킨뒤, notice_groups table 저장
 */
Route::post('store', 'BlockController@store');

Route::get('equal/{hash}', 'BlockController@blockEqualsCurrent');