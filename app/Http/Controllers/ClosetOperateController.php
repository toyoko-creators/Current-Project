<?php

namespace App\Http\Controllers;

use App\Clothe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class ClosetOperateController extends Controller
{


    public function ButtonSelector(Request $request) {
        if(!Session::has('userid')){
            return view('login');
        } elseif ($request->has('TopsButton')) {
            return redirect('/toimageupload')->with('weartype',"Top");
        } elseif ($request->has('BottomsButton')) {
            return redirect('/toimageupload')->with('weartype',"Bottom");
        }  elseif ($request->has('logout')) {
            Session::flush();
            return redirect('/logout');
        }  elseif ($request->has('closet')) {
            return redirect('/favolist');
        }  elseif ($request->has('TopUpload')) {
            $data = ClosetOperateController::imageUpload($request->uploadTopFile, "Top");
            return redirect('/closet');
        }  elseif ($request->has('BottomUpload')) {
            $data = ClosetOperateController::imageUpload($request->uploadButtomFile, "Bottom");
            return redirect('/closet');
        }else{
            Session::flush();
            return redirect('/logout');
        }
    }

    private static function imageUpload($UpFile, $weartype)
    {
        $email = Session::get('userid');
        if(empty($email)){
            Session::flush();
            return;
        }
        if(empty($UpFile)){
            $data = [
                'weartype'=>$weartype,
                'message'=>"ファイルを選択して下さい"
            ];
            return $data;
        }
        $FileName = uniqid().".".$UpFile->getClientOriginalExtension();
        try{
            $UpFile->storeAs("public/image/".$email."/".$weartype,$FileName);
            $data = [
                'weartype'=>$weartype,
                'message'=>"images/".$email."/".$weartype,$FileName
            ];
        } catch (\Exception $e) {
            $data = [
                'weartype'=>$weartype,
                'message'=>"画像の登録に失敗しました:".$weartype.":".$e->getMessage()
            ];
            return $data;
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
        return $data;
    }

 /*   public function openPage()
    {
        $data = [
            'Topvalue'=>self::getClothList('Top',1),
            'Bottomvalue'=>self::getClothList('Bottom',2)
        ];
        return view('closet',$data);
    }

    public static function getClothList(string $weartype,int $i)
    {   $email = Session::get('userid');
        $clotheList = Clothe::select('ImageFile')
        ->where('email', (string)$email)
        ->where('WearType',(string) $weartype)
        ->get()
        ->toArray();
        $type = ["Top","Bottom"];
        foreach ($clotheList as $row2){
            if(!isset($divValue)){
                $divValue ="";
            };
            $filename = print_r($row2['ImageFile']);
            $divValue = $divValue.'<div><img src="'.asset('storage/public/'.session('userid').$type[$i-1].$filename).'" alt="'.$filename.'" </div>\n';
        }
        if(!isset($divValue)){
            $divValue ='<div class="slick0'.strval($i).'">no image</div>';
        }else{
            $divValue ='<div class="slick0'.strval($i).'">\n'.$divValue.'</div>';
        }
        return (string)$divValue;
    }
    */
}
