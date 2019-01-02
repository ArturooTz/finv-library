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

Route::get('/', 'FinvInfoController@show');

Route::view('/test', 'testview');

Route::post('/upload-finv', ['uses' => 'FinvInfoController@store', 'as' => 'store']);

Route::get('/get-finv-info/{id}', 'FinvInfoController@display');

Route::get('/get-finv-code/{id}', 'FinvInfoController@getFinvSourceCode');

Route::get('/download-code/{id}', 'FinvInfoController@downloadSourceCode');

Route::get('/test1', 'FinvInfoController@visibilityTest');
