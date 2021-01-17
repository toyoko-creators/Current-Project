<?php

namespace App\Http\Controllers;

use App\Clothe;
use Illuminate\Http\Request;

class ClotheListoperateController extends Controller
{
    public function GetClothList(Request $request)
    {
        $ClotheList = Clothe::get(['ImageFile'])
                    ->where('Email',$request->Top)
                    ->where('WearType',$request->WearType);
            $data = ['ClotheList'=>$ClotheList];
            return view('closet', $data);
    }

}
