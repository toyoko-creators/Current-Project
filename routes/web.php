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
    //return view('welcome');
    return redirect('/login');
});

Route::get('/login', function () {
    // if(!session::has('userid')){
    //     return redirect('/closet');
    // }
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

Route::get('/closet', 'ClosetOperateController@openPage');
Route::get('/favorite', function () {
    //if(!session::has('userid')){
    //    return redirect('/login');
    //}
    return view('favorite');
});

Route::get('/imageupload', function () {
    //if(!session::has('userid')){
    //    return redirect('/login');
    //}
    return view('imageupload');
});

Route::post('closetbutton', 'ClosetOperateController@BottonSelector');

Route::post('imageUpload', 'ImageUploadOperateController@register');


Route::get('/userLogin',function(){
    return redirect('/login');
});