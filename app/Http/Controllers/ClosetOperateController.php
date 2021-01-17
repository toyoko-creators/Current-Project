<?php

namespace App\Http\Controllers;

use App\Favolist;
use Illuminate\Http\Request;

class ClosetOperateController extends Controller
{
    public function Favregister(Request $request)
    {
        $FavCombo = Favolist::where('Topfile',$request->Top)
                    ->where('Bottomfile',$request->Bottom)
                    ->first();
        if($FavCombo != null)
        {
            $data = [
                'msg'=>"その組み合わせはすでに登録済みです"
            ];
            return view('closet', $data);
        }
        else
        {
            Favolist::create([
                'email'=>$request->email,
                'Topfile'=>$request->Top,
                'Bottomfile'=>$request->Bottom
            ]);
            
            return redirect('/closet')->with('通知', 'お気に入りに登録しました');
        }
    }

    public function BottonSelector(Request $request) {
        if ($request->has('TopsButton')) {
            $data = [
                'WeaweartyperType'=>"Top"
            ];
            return view('imageupload', $data);
        } elseif ($request->has('BottomsButton')) {
            $data = [
                'weartype'=>"Bottom"
            ];
            return view('imageupload', $data);
        }  elseif ($request->has('logout')) {
            session('userid')->put($request->email);
            $request->session()->flush();
            return view('/login');
        }elseif ($request->has('outfit')) {
            $this->Favregister( $request);
            return view('/closet');
        }else{
            $request->session()->flush();
            return view('/login');
        }
    }

}
