<?php

namespace App\Http\Controllers;

use App\User;
use App\Clothe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadOperateController extends Controller
{
    public function register(Request $request,user $user)
    {
        $FileName = uniqid(mt_rand(), true);
        try{
            $email = session()->get('userid', $request->email);
            $dirpath = $request->file('image')->store('public/'.$request->weartype.'/'.$user->name);
            $path = Storage::disk('public')->putFileAs($dirpath,$_FILES['image']['name'], $FileName);
            Clothe::create([
                'email'=>$email,
                'WearType'=>$request->weartype,
                'FileName'=>$FileName
            ]);
        } catch (\Exception $e) {
            $data = [
                'WearType'=>$request->weartype
            ];
            view('imageupload', $data);
            return view('imageupload', $data)->with('通知', "画像の登録に失敗しました\n".$e->getMessage());
        }
            $data = [
                'WearType'=>$request->weartype
            ];
            view('imageupload', $data);
            return view('imageupload', $data)->with->with('通知', '画像の登録が完了しました');
    }

}
