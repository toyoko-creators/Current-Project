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
            <h1>ユーザー登録</h1>
            <?php if(isset( $msg )): ?>
            <p><?php echo e($msg); ?></p>
            <?php endif; ?>
            <p style="color: red"></p>   
            <form action="userRegister" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="form-item">
                    <label for="lastname"></label>
                    <input type="text" name="lastname" id="lastname" required="required" placeholder="姓">
                </div>
                <div class="form-item">
                    <label for="firstname"></label>
                    <input type="text" name="firstname" id="firstname" required="required" placeholder="名">
                </div>
                <div class="form-item">
                    <label for="email"></label>
                    <input type="email" name="email" id="email" required="required" placeholder="Email アドレス">
                </div>
                <div class="form-item">
                    <label for="password"></label>
                    <input type="password" name="Password" id="Password" required="required" placeholder="パスワード">
                </div>
                <div class="form-item">
                    <label for="password2"></label>
                    <input type="password" name="password2" required="required" placeholder="パスワード確認用">
                </div>
                <div class="button-panel">
                    <input type="submit" name="adduser" class="button" value="登録">
                </div>
            </form>
            <div class="form-footer">
            <p><a href="<?php echo e(url('/login')); ?>">Back to home</a></p>
        </div>
    </body>
</html>
