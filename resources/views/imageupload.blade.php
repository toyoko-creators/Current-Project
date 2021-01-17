<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>イメージ追加:@if(isset( $WearType )){{$WearType}} @endif</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
<h1>画像アップロード：@if(isset( $WearType )){{$WearType}} @endif</h1>
<form method="post" action="closetbutton" enctype='multipart/form-data'>
{{ csrf_field() }}
<p>・タイプ切り替え<br>
    <input type="submit" name="TopsButton"  value="トップス">
    <input type="submit" name="BottomsButton"  value="ボトム">
</form><br>
</p> 
    <form action="imageUpload" method="POST">
        {{ csrf_field() }}
        <p>アップロード画像</p>
        <input type="file" name="image"　accept="image/png" onchange="javascript:document.getElementById('upload').disabled = false">
        <button><input type="submit" name="upload" id="upload" value="送信" disabled></button>
    </form>
    @if (!empty($ClotheList)): ?>
        <br><hr><br>
        <p>登録済み画像一覧</p>
        <table>
            <thead>
                <tr>
                <th>WearType</th>
                <th>imageid</th>
                <th>image</th>
                </tr>
            </thead>
            <tbody>
            @foreach ((array)$ClotheList as $row)
                <tr>
                <td><?php echo $row["WearType"]; ?></td>
                <td><?php echo $row["ImageFile"]; ?></td>
                <td>
                    <img src='Images/.'/'.{{$WearType}}/@if(isset( $row['ImageFile'] )){{$row['ImageFile']}} @endif.png' width="300" height="300"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
<br><hr><br>
<a href="{{ url('/closet') }}">Back to home</a>

    </body>
</html>

