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

use Illuminate\Support\Facades\Session;
Route::get('/', function () {
    //return view('welcome');
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/user', function () {
    return view('user');
});
Route::post('userRegister', 'userOperateController@register');
Route::post('userLogin', 'userOperateController@login');

Route::post('AddTop', 'userOperateController@register');

Route::get('/favlist', 'FavolistOperationController@openPage');
Route::get('/closet', 'ClosetOperateController@openPage');

Route::get('/imageupload', function () {
    return view('imageupload');
});
Route::get('/logout', function () {
    Session::flush();
    return view('login');
});

Route::post('closetbutton',   'ClosetOperateController@BottonSelector');
Route::post('favolistbutton', 'FavolistOperationController@BottonSelector');
Route::get('favoregedit', 'FavolistOperationController@regedit');

Route::post('imageUpload', 'ImageUploadOperateController@register');


Route::get('/userLogin',function(){
    return redirect('/login');
});