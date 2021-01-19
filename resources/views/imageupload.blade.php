<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>イメージ追加:@if(isset( $weartype )){{$weartype}} @endif</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
<h1>画像アップロード：@if(isset( $weartype )){{$weartype}} @endif</h1>
@if(isset( $message ))<div> {{$message}}</div> @endif
<form method="post" action="closetbutton" enctype='multipart/form-data'>
{{ csrf_field() }}
<p>・タイプ切り替え<br>
    <input type="submit" name="TopsButton"  value="トップス">
    <input type="submit" name="BottomsButton"  value="ボトム">
</form><br>
</p> 
    <form action="imageUpload" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <p>アップロード画像</p>
        @if(isset( $weartype ))
            <input type="hidden" name="weartype" id="weartype" value="{!!$weartype!!}" >
        @endif
        <input type="file" name="image" accept="image/png" onchange="javascript:document.getElementById('upload').disabled = false">
        <button><input type="submit" name="upload" id="upload" value="upload" disabled></button>
    </form>
<br><hr><br>
<a href="{{ url('/closet') }}">Back to home</a>

    </body>
</html>

