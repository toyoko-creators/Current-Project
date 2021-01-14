<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div class="form-wrapper">
            <h1>ログイン</h1>
            <?php if(isset( $msg )): ?>
            <p><?php echo e($msg); ?></p>
            <?php endif; ?>
            <form method="post" action="userLogin">
                <?php echo e(csrf_field()); ?>

                <div class="form-item">
                    <label for="email"></label>
                    <input type="email" name="email" required="required" placeholder="Email アドレス">
                </div>
                <div class="form-item">
                    <label for="password"></label>
                    <input type="password" name="password" required="required" placeholder="パスワード">
                </div>
                <div class="button-panel">
                    <input type="submit" name="login" class="button" value="ログイン">
                </div>
            </form>
            <div class="form-footer">
                <p><a href="<?php echo e(url('/user')); ?>">ユーザーアカウント作成</a></p>
            </div>
        </div>
    </body>
</html>
