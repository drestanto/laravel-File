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

Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

Route::get('upload', 'UploadController@index');
Route::post('store', 'UploadController@store');
Route::get('showpath/{path}', 'UploadController@showImage');
Route::get('show/{name}', 'UploadController@showImageByName');
Route::get('showAll', 'UploadController@showAllImages');

Route::get('search', 'UploadController@showAllImages');
Route::get('search/{keyword}', 'UploadController@search');