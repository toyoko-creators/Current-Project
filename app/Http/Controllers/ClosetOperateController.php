<?php

namespace App\Http\Controllers;

use App\Clothe;
use App\Favolist;
use App\Http\Controllers\FavolistOperationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class ClosetOperateController extends Controller
{


    public function BottonSelector(Request $request) {
        if(!isset($request) && !Session::has('userid')){
            return view('login');
        } elseif ($request->has('TopsButton')) {
            $data = [
                'weartype'=>"Top"
            ];
            return view('imageupload', $data);
        } elseif ($request->has('BottomsButton')) {
            $data = [
                'weartype'=>"Bottom"
            ];
            return view('imageupload', $data);
        }elseif ($request->has('outfit')) {
            FavolistOperationController::register( );
            return view('closet' );
        }  elseif ($request->has('logout')) {
            Session::flush();
            return redirect('/logout');
        }  elseif ($request->has('closet')) {
            
        }else{
            return redirect('/logout');
        }
    }

    public function openPage(){
        $email = Session::get('userid');
        $topclothes = Clothe::select('ImageFile')
        ->where('email', (string)$email)
        ->where('WearType',(string) 'Top')
        ->get()
        ->toArray();
        foreach ($topclothes as $row){
            if(!isset($slick1divValue)){
                $slick1divValue ="";
            };
            $targetfilepath = url(Storage::disk('local')->url("image/".$email."/Top/".$row['ImageFile']));
            $slick1divValue .= '<img src="'.$targetfilepath.'" alt="'.$row['ImageFile'].'"   width="300" height="300">';
        }
        if(!isset($slick1divValue)){
            $slick1divValue ='<div class="slick01">no image</div>';
        }else{
            $slick1divValue ='<div class="slick01">'.$slick1divValue.'</div>';
        }
        $bottomclothes = Clothe::select('ImageFile')
        ->where('email', (string)$email)
        ->where('WearType',(string) 'Bottom')
        ->get()
        ->toArray();
        foreach ($bottomclothes as $row){
            if(!isset($slick2divValue)){
                $slick2divValue ="";
            };
            $targetfilepath = url(Storage::disk('local')->url("image/".$email.'/Bottom/'.$row['ImageFile']));
            $slick2divValue .= '<img src="'.$targetfilepath.'" alt="'.$row['ImageFile'].'"  width="300" height="300">';
        }
        if(!isset($slick2divValue)){
            $slick2divValue ='<div class="slick02">no image</div>';
        }else{
            $slick2divValue ='<div class="slick02">'.$slick2divValue.'</div>';
        }
        $data = [
            'Topvalue'=>$slick1divValue,
            'Bottomvalue'=>$slick2divValue
        ];
        return view('closet',$data);
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
