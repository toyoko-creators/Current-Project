<?php

namespace App\Http\Controllers;

use App\Clothe;
use App\Favolist;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ViewpageController extends Controller
{

    public function closetopenPage(){
        if(!Session::has('userid')){
            return redirect('/login');
        }
        $email = Session::get('userid');
        $topclothes = Clothe::select('ImageFile')
        ->where('email', (string)$email)
        ->where('WearType',(string) 'Top')
        ->get()
        ->toArray();
        foreach ($topclothes as $row){
            if(!isset($topdefaultfile)){
                $topdefaultfile =$row['ImageFile'];
            }
            if(!isset($slick1divValue)){
                $slick1divValue ="";
            }
            $targetfilepath = url(Storage::disk('local')->url("image/".$email."/Top/".$row['ImageFile']));
            $slick1divValue .= '<img src="'.$targetfilepath.'" alt="'.$row['ImageFile'].'"  id="'.$row['ImageFile'].'" '.'onclick="imageselect(\'Top\',\''.$row['ImageFile'].'\')" width="300" height="300">';
        }
        if(!isset($topdefaultfile)){
            $topdefaultfile ="";
        }
        if(!isset($slick1divValue)){
            $slick1divValue ='<div class="slick01">no image</div>';
        }else{
            $slick1divValue ='<div id="slick01" class="slick01">'.$slick1divValue.'</div>';
        }
        $bottomclothes = Clothe::select('ImageFile')
        ->where('email', (string)$email)
        ->where('WearType',(string) 'Bottom')
        ->get()
        ->toArray();
        foreach ($bottomclothes as $row){
            if(!isset($bottomdefaultfile)){
                $bottomdefaultfile =$row['ImageFile'];
            }
            if(!isset($slick2divValue)){
                $slick2divValue ="";
            }
            $targetfilepath = url(Storage::disk('local')->url("image/".$email.'/Bottom/'.$row['ImageFile']));
            $slick2divValue .= '<img src="'.$targetfilepath.'" alt="'.$row['ImageFile'].'"  id="'.$row['ImageFile'].'" '.'onclick="imageselect(\'Bottom\',\''.$row['ImageFile'].'\')" width="300" height="300">';
        }
        if(!isset($bottomdefaultfile)){
            $bottomdefaultfile ="";
        }
        if(!isset($slick2divValue)){
            $slick2divValue ='<div class="slick02">no image</div>';
        }else{
            $slick2divValue ='<div id="slick02" class="slick02">'.$slick2divValue.'</div>';
        }
        $data = [
            'Topvalue'=>$slick1divValue,
            'Bottomvalue'=>$slick2divValue,
            'topfirst'=>$topdefaultfile,
            'bottomfirst'=>$bottomdefaultfile
        ];
        return view('closet',$data);
    }

    public function favPaveopenPage(){
        if(!Session::has('userid')){
            return redirect('/login');
        }
        $email = Session::get('userid');
        $favitemsresult = Favolist::select('TopFile','BottomFile')
        ->where('email', (string)$email)
        ->get()
        ->first();
        
        if($favitemsresult != null){
            $favitems = Favolist::select('TopFile','BottomFile','ID')
            ->where('email', (string)$email)
            ->get()
            ->toArray();
            foreach ($favitems as $row){
                if(!isset($slickdivValue)){
                    $slickdivValue ="";
                };
                $Toptargetfilepath = url(Storage::disk('local')->url("image/".$email."/Top/".$row['TopFile']));
                $slickValueTop = '<img src="'.$Toptargetfilepath.'" alt="'.$row['TopFile'].'"   width="300" height="300">';
                $Bottomtargetfilepath = url(Storage::disk('local')->url("image/".$email."/Bottom/".$row['BottomFile']));
                $slickValueBottom = '<img src="'.$Bottomtargetfilepath.'" alt="'.$row['BottomFile'].'"  width="300" height="300">';
                $slickdivValue .= '<span id="'.(String)$row['ID'].'" onclick="idselect(\''.$row['ID'].'\')">'.$slickValueTop.$slickValueBottom.'</span>';
            }
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
