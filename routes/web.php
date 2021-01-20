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
use Illuminate\Http\Request;
Route::get('/', function (Request $request) {
    if( Session::has('userid')){
        return redirect('/closet');
    }else{
        if( isset($request->msg )){
            $textmsg = $request->msg;
        }else{
            $textmsg = "";
        }
        $data = [
            'msg'=>$textmsg
        ];
        return redirect('/login',$data);
    }
});

Route::post('userRegister', 'userOperateController@register');
Route::post('userLogin', 'userOperateController@login');

Route::post('AddTop', 'userOperateController@register');

Route::get('/favolist', 'FavolistOperationController@openPage');
Route::get('/closet', 'ClosetOperateController@openPage');

Route::get('/toimageupload', function () {
    if( isset($request) && session::has('weartype') ){
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


Route::post('closetbutton',   'ClosetOperateController@BottonSelector');
Route::post('favolistbutton', 'FavolistOperationController@BottonSelector');
Route::get('favoregedit', 'FavolistOperationController@regedit');

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