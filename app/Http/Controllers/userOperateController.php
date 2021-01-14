<?php

namespace App\Http\Controllers;

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
            
            $data = [
                'msg'=>"ユーザーを登録しました。",
                'email'=>$request->email,
            ];
            return view('login', $data);
        }
    }

    public function login(Request $request)
    {
        $selectuser = User::where('email',$request->email)
                         ->where('password',$request->password)
                         ->first();
        if($selectuser != null)
            return view('closet', $selectuser);
        else
        {
            $data = [
                'msg'=>"ユーザーが存在しません"
            ];
            return view('login', $data);
        }
    }
}
