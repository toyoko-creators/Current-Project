<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div id="container">
            <div id="Menu_frame">
                <form method="post">
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
<!--
            <div id="Main_frame_tops">
                <div class="slick01">
                    <?php /* foreach ((array)$tops as $row) : ?>
                        <img alt=" <?php echo $row["ImageFile"]; ?>" src="images/<?php echo $row["ImageFile"]; ?>.png">
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="Main_frame_bottoms">
                <div class="slick02">
                    <?php foreach ((array)$bottoms as $row) : ?>
                        <img alt=" <?php echo $row["ImageFile"]; ?>" src="images/<?php echo $row["ImageFile"]; ?>.png">
                    <?php endforeach; */?>
                </div>
            </div>
        </div>
-->
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/common.js"></script>
    </body>
</html>
