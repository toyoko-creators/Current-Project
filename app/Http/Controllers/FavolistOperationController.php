<?php

namespace App\Http\Controllers;

use App\Clothe;
use App\Favolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FavolistOperationController extends Controller
{
    //
    public static function register()
    {
        if(!Session()->has('userid')){
            return view('/login');
        }
        //暫定で最初のファイルで登録（上下登録している前提）
        $FavCombo = null;
        $topfile = glob(storage_path("app/public/image/").Session::get('userid')."/Top/*",GLOB_NOSORT );
        $bottomfile = glob(storage_path("app/public/image/")."/".Session::get('userid')."/Bottom/*",GLOB_NOSORT );
        //            ->first();
        //$FavCombo = Favolist::where('Topfile',$request->Top)
        //            ->where('Bottomfile',$request->Bottom)
        //            ->first();
        if($FavCombo != null)
        {
            $data = [
                'msg'=>"その組み合わせはすでに登録済みです"
            ];
            return view('closet', $data);
        }
        else
        {
            try{
                Favolist::create([
                    'email'=>Session::get('userid'),
                    'TopFile'=>basename($topfile[0]),
                    'BottomFile'=>basename($bottomfile[0])
                    //'Topfile'=>$request->Top,
                    //'Bottomfile'=>$request->Bottom
                ]);
            
                $data = [
                    'msg'=>'お気に入りに登録しました'
                ];
            } catch (\Exception $e) {
                $data = [
                    'msg'=>"お気に入りに登録できませんでした:".$e->getMessage()
                ];
            }
            return view('closet',$data);
        }
    }
    public function BottonSelector(Request $request) {
        if(!isset($request) && !Session::has('userid')){
            return view('login');
        } elseif ($request->has('TopPage')) {
            return view('closet');
        } elseif ($request->has('DeleteCollection')) {
            //お気に入り削除処理(機能なし)
            return view('favolist');
        } elseif ($request->has('logout')) {
            Session::flush();
            return view('login');
        }else{
            Session::flush();
            return view('login');
        }
    }

    public function openPage(){
        $email = Session::get('userid');
        $favitems = Favolist::select('TopFile','BottomFile')
        //->where('email', (string)$email)
        ->get()
        ->toArray();
        foreach ($favitems as $row){
            if(!isset($slickdivValue)){
                $slickdivValue ="";
            };
            $Toptargetfilepath = url(Storage::disk('local')->url("image/".$email."/Top/".$row['TopFile']));
            $slickValueTop = '<img src="'.$Toptargetfilepath.'" alt="'.$row['TopFile'].'"   width="300" height="300">>';
            $Bottomtargetfilepath = url(Storage::disk('local')->url("image/".$email."/Bottom/".$row['BottomFile']));
            $slickValueBottom = '<img src="'.$Bottomtargetfilepath.'" alt="'.$row['BottomFile'].'"  width="300" height="300">>';
            $slickdivValue .= '<span>"'.$slickValueTop.$slickValueBottom.'</span>';
        }
        if(!isset($slickdivValue)){
            $slickdivValue ='<p>1つもお気に入り登録されていません</p>';
        }else{
            $slickdivValue ='<div class="slickSet">'.$slickdivValue.'</div>';
        }
        $data = [
            'slick1divValue'=>$slickdivValue
        ];
        return view('favolist',$data);
    }
}