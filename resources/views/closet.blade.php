<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="css/app.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/slick.css" type="text/css">
        <link rel="stylesheet" href="css/slick-theme.css" type="text/css">
        @if( session('msg')!==NULL)
        <script>
            alert('{!! session("msg") !!}');
        </script>
        @endif
    </head>
    <body>
        <div id="container">
            <div id="Menu_frame">
                <form action="closetbutton" method="POST" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="button-normal">
                        <input type="submit" class="button" name="closet" value="クローゼット">
                    </div>
                    <div class="button-normal">
                        <button type="button" id="outfit" class="button" name="outfit" value="コーディネート保存" onclick="savefav()">コーディネート保存</botton>
                    </div>
<!--                    <div class="button-normal">
                        <input type="submit" class="button" name="TopsButton" value="トップス選択">
                        <input type="submit" class="button" name="BottomsButton"  value="ボトムス選択">
                    </div>
-->
                    <div class="button-normal">
                        <label>
                            トップス選択
                            <input type="file" name="uploadTopFile" accept="image/png" style="display:none">
                            <input type="submit" class="submit" name="TopUpload" value="Upload">
                        </label>
                    </div>
                    <div class="button-normal">
                        <label>
                            ボトムス選択
                            <input type="file" name="uploadButtomFile" accept="image/png" style="display:none">
                            <input type="submit" class="submit" name="BottomUpload" value="Upload">
                        </label>
                    </div>
                    <div class="button-normal Pos-Lowerleft">
                        <input type="submit" class="button" name="logout" value="ログアウト">
                    </div>
                </form>
            </div>
            <div id="Main_frame_tops">
                @if(isset( $Topvalue ))
                    {!! $Topvalue !!}
                @endif
            </div>
            <div id="Main_frame_bottoms">
                @if(isset( $Bottomvalue ))
                    {!! $Bottomvalue !!}
                @endif
            </div>
        </div>
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/common.js"></script>
        <script src="js/fav.js"></script>
    </body>
</html>
