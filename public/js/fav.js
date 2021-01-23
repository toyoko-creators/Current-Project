var topfilename = "";
var bottomfilename ="";
var selectid="";

function imageselect(type,name){
    if(type=="Top"){topfilename = name;}
    else{bottomfilename = name;}
}

function idselect(id){
    selectid = id;
}
function savefav(){
    if(!topfilename || !bottomfilename ){
        location.replace("/favoregedit");
    }
    location.replace("/favoregedit/"+topfilename+"/"+bottomfilename);
    return true;
}

function delfav(){
    if(!selectid ){
        location.replace("/favdelete");
    }
    location.replace("/favdelete/"+selectid);
    return true;
}