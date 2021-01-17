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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/user', function () {
    return view('user');
});
Route::post('userRegister', 'userOperateController@register');
Route::post('userLogin', 'userOperateController@login');

Route::post('Favregister', 'userOperateController@register');

Route::post('AddTop', 'userOperateController@register');
Route::post('Favregister', 'userOperateController@register');

Route::get('/closet', function () {
    return view('closet');
});
Route::get('/favorite', function () {
    return view('favorite');
});

Route::get('/imageupload', function () {
    return view('imageupload');
});

Route::post('closetbutton', 'ClosetOperateController@BottonSelector');

Route::post('imageUpload', 'ImageUploadOperateController@register');