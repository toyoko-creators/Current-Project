<?php

namespace App\Http\Controllers;

use App\Clothe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ImageUploadOperateController extends Controller
{
    public function register(Request $request )
    {
        $email = Session::get('userid');
        if(empty($email)){
            Session::flush();
            return redirect('/login');
        }
        $UpFile = $request->image;
        if(empty($UpFile)){
            $data = [
                'weartype'=>$request->weartype,
                'message'=>"ファイルを選択して下さい"
            ];
            return redirect('/toimageupload')->with($data);
        }
        $FileName = uniqid().".".$UpFile->getClientOriginalExtension();
        $weartype = $request->weartype;
        if(empty($weartype)||empty($weartype)){
            return redirect('/toimageupload')->with('weartype',$request->weartype);
        }
        try{
            $UpFile->storeAs("public/image/".$email."/".$weartype,$FileName);
            $data = [
                'weartype'=>$request->weartype,
                'message'=>"images/".$email."/".$weartype,$FileName
            ];
            
        } catch (\Exception $e) {
            $data = [
                'weartype'=>$weartype,
                'message'=>"画像の登録に失敗しました:".$weartype.":".$e->getMessage()
            ];
            return redirect('/toimageupload')->with($data);
        }
        try{
            Clothe::create([
                'ImageFile'=>$FileName,
                'email'=>Session::get('userid'),
                'WearType'=>$weartype
            ]);
            $data = [
                'weartype'=>$weartype,
                'message'=>'画像の登録が完了しました'
            ];
        } catch (\Exception $e) {
            //DB登録失敗したので画像削除
            Storage::disk('local')->delete("public/".$email."/".$weartype.$FileName);
            $data = [
                'weartype'=>$weartype,
                'message'=>"画像の登録に失敗しました\n".$e->getMessage()
            ];
        }
        return redirect('/toimageupload')->with($data);
    }

}
