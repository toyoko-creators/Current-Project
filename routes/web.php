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
        return redirect('/userLogin');
});

Route::post('userRegister', 'userOperateController@register');
Route::post('userLogin', 'userOperateController@login');

Route::post('AddTop', 'userOperateController@register');

Route::get('/favolist', 'ViewpageController@favPaveopenPage');
Route::get('/closet', 'ViewpageController@closetopenPage');

Route::get('/toimageupload', function () {
    if( session::has('weartype') ){
        $typevalue = session::get('weartype');
    }else{
        $typevalue = "Top";
    }

    return redirect('/imageupload')->with('weartype',$typevalue);
});

Route::get('/imageupload', function () {
        $data = [
            'weartype'=>session::get("weartype")
        ];
    return view('imageupload',$data);
});


Route::post('closetbutton',   'ClosetOperateController@ButtonSelector');
Route::post('favolistbutton', 'FavolistOperationController@ButtonSelector');
Route::get('/favoregedit/{Topfile}/{Bottomfile}', 'FavolistOperationController@register');
Route::get('/favoregedit/{aaaa}', function(){
        return redirect('/userLogin');
});
Route::get('/favdelete/{targetId}', 'FavolistOperationController@delete');
Route::get('/favdelete', function(){
        return redirect('/userLogin');
});
Route::get('/favoregedit', function(){
        return redirect('/userLogin');
});

Route::post('imageUpload', 'ImageUploadOperateController@register');


Route::get('/logout', function () {
    Session::flush();
    return redirect('/login');
});
Route::get('/userLogin',function(){

    if( Session::has('userid')){
        return redirect('/closet');
    }else{
        return redirect('/login');
    }
});
Route::get('/login', function () {
    return view('login');
})->name('loginwithmsg');;
Route::get('/user', function () {
    return view('user');
});