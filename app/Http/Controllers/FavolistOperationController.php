<?php

namespace App\Http\Controllers;

use App\Clothe;
use App\Favolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FavolistOperationController extends Controller
{
    //
    public static function register($Topfile,$Bottomfile)
    {
        if(!Session()->has('userid')){
            return redirect('/login');
        }
        if(empty($Topfile) || empty($Bottomfile)){
            return redirect('/closet')->with('msg',"画像を選択してください");
        }
        try{
            $clothCheckTop = Clothe::where('WearType','Top')
                        ->where('ImageFile',$Topfile)
                        ->where('email',Session()->get('userid'))
                        ->get()
                        ->first();
            $clothCheckBottom = Clothe::where('WearType','Bottom')
                        ->where('ImageFile',$Bottomfile)
                        ->where('email',Session()->get('userid'))
                        ->get()
                        ->first();
            if(!$clothCheckTop || !$clothCheckBottom){
                return redirect('/closet')->with('msg',"エラーが発生しました。再度選択してください。");
            }

            $FavCombo = Favolist::where('TopFile',$Topfile)
                        ->where('BottomFile',$Bottomfile)
                        ->get()
                        ->first();
            if($FavCombo)
            {
                $msg = "その組み合わせはすでに登録済みです";
            }
            else
            {
                    Favolist::create([
                        'email'=>(string)Session::get('userid'),
                        'TopFile'=>$Topfile,
                        'BottomFile'=>$Bottomfile
                    ]);
                
                    $msg = 'お気に入りに登録しました';
            }
        } catch (\Exception $e) {
            $msg = "お気に入りに登録できませんでした。再度実行してください";
        }
        return redirect('/closet')->with('msg',(string)$msg);
        //return $Resultdata;
    }


    
    public static function delete($targetId)
    {   
        if(!Session()->has('userid')){
            return redirect('/login');
        }
        if(empty($targetId) ){
                return redirect('/favolist')->with('msg',"エラーが発生しました。再度選択してください。");
        }
        try{
            $IDCheckTop = Favolist::where('ID',(int)$targetId)
                        ->where('email',Session()->get('userid'))
                        ->get()
                        ->first();
            if(!$IDCheckTop){
                return redirect('/favolist')->with('msg',"エラーが発生しました。再度選択してください。");
            }
                Favolist::where('ID',(int)$targetId)
                        ->delete();
                $msg = 'お気に入りから削除しました';
        } catch (\Exception $e) {
            return redirect('/favolist')->with('msg',"エラーが発生しました。再度選択してください。");
        }
        return redirect('/favolist')->with('msg',(string)$msg);
    }

    public function ButtonSelector(Request $request) {
        if(!Session::has('userid')){
            return redirect('/login');
        } elseif ($request->has('TopPage')) {
            return redirect('/closet');
        } elseif ($request->has('logout')) {
            Session::flush();
            return redirect('/login');
        }else{
            Session::flush();
            return redirect('/login');
        }
    }

}
