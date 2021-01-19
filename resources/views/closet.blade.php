<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Cordination Editor</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/slick.css" type="text/css">
        <link rel="stylesheet" href="css/slick-theme.css" type="text/css">
    </head>
    <body>
        <div id="container">
            <div id="Menu_frame">
            <form action="closetbutton" method="POST">
                {{ csrf_field() }}
                    <div class="button-normal">
                        <input type="submit" name="closet" value="クローゼット">
                    </div>
                    <div class="button-normal">
                        <input type="submit"  name="outfit" value="コーディネート保存">
                    </div>
                    <div class="button-normal">
                        <input type="submit" name="logout" value="ログアウト">
                    </div>
                    <div class="button-normal">
                        <input type="submit" class="button" name="TopsButton" value="トップス選択">
                        <input type="submit" class="button" name="BottomsButton"  value="ボトムス選択">
                    </div>
                </form>
            </div>
            <div id="Main_frame_tops">
                @if(isset( $msg ))
                <div>{{$msg}}</div>
                @endif
                @if(isset( $Topvalue ))
                    {!! $Topvalue !!}
                @endif
                @if(isset( $Bottomvalue ))
                    {!! $Bottomvalue !!}
                @endif
            </div>
        </div>
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/common.js"></script>
    </body>
</html>
