<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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
        }else{
            Session::flush();
            return redirect('/logout');
        }
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
