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
        @if( session('msg')!==NULL)
        <script>
            alert('{!! session("msg") !!}');
        </script>
        @endif
    </head>
    <body>
        <div id="container">
            <div id="Menu_frame">
            <h2>クローゼット</h2>
            <form action="favolistbutton" method="POST">
                {{ csrf_field() }}
                    <div class="button-normal">
                        <input type="submit" name="TopPage" class="button"  value="Topに戻る">
                    </div>
                    <div class="button-normal">
                        <button type="button" id="DeleteCollection" class="button" name="DeleteCollection" value="お気に入り削除" onclick="delfav()">お気に入り削除</botton>
                    </div>
                    <div class="button-normal Pos-Lowerleft">
                        <input type="submit" class="button" name="logout" value="ログアウト">
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
        <script src="js/fav.js"></script>
        @if(!empty( $defaultid ))
        <script>
            selectid = "{!! $defaultid !!}";
        </script>
        @endif
    </body>
</html>
