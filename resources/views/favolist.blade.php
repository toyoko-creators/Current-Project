<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Cordination Editor</title>
        <link rel="stylesheet" href="css/app.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/slick.css" type="text/css">
        <link rel="stylesheet" href="css/slick-theme.css" type="text/css">
    </head>
    <body>
        <div id="container">
            <div id="Menu_frame">
            <h2>クローゼット</h2>
            <form action="favolistbutton" method="POST">
                {{ csrf_field() }}
                    <div class="button-normal">
                        <input type="submit" name="TopPage" value="Topに戻る">
                    </div>
                    <div class="button-normal">
                        <input type="submit"  name="DeleteCollection" value="お気に入り削除">
                    </div>
                    <div class="button-normal">
                        <input type="submit" name="logout" value="ログアウト">
                    </div>
                </form>
            </div>
            <div id="Main_frame">
                    @if(isset( $slick1divValue ))
                        {!! $slick1divValue !!}
                    @endif
            </div>
        </div>
        </div>
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/common.js"></script>
    </body>
</html>
