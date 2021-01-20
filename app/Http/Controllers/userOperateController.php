<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\User;
use Illuminate\Http\Request;

class userOperateController extends Controller
{
    public function register(Request $request)
    {
        $selectuser = User::where('email',$request->email)
                    ->first();
        if($selectuser != null)
        {
            $data = [
                'msg'=>"すでに登録済みです"
            ];
            return view('user', $data);
        }
        else
        {
            User::create([
                'email'=>$request->email,
                'lastname'=>$request->lastname,
                'firstname'=>$request->firstname,
                'password'=>$request->Password,
            ]);
            
            return redirect('/login')->with('msg', 'ユーザーを登録しました。');
        }
    }

    public function login(Request $request)
    {
        $selectuser = User::where('email',$request->email)
                         ->where('password',$request->password)
                         ->first();
        if($selectuser != null){
            // 値を保存
            Session::put('userid', $request->email);
            return redirect('/closet');
        }
        else
        {
            return redirect('/login')->with('msg', 'ユーザーが存在しません');
        }
    }
}
