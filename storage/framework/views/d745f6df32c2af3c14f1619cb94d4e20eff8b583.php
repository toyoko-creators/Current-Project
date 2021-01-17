<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>イメージ追加:<?php if(isset( $WearType )): ?><?php echo e($WearType); ?> <?php endif; ?></title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
<h1>画像アップロード：<?php if(isset( $WearType )): ?><?php echo e($WearType); ?> <?php endif; ?></h1>
<form method="post" action="closetbutton" enctype='multipart/form-data'>
<?php echo e(csrf_field()); ?>

<p>・タイプ切り替え<br>
    <input type="submit" name="TopsButton"  value="トップス">
    <input type="submit" name="BottomsButton"  value="ボトム">
</form><br>
</p> 
    <form action="imageUpload" method="POST">
        <?php echo e(csrf_field()); ?>

        <p>アップロード画像</p>
        <input type="file" name="image" onchange="javascript:document.getElementById('upload').disabled = false">
        <button><input type="submit" name="upload" id="upload" value="送信" disabled></button>
    </form>
    <?php if(!empty($ClotheList)): ?>: ?>
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
            <?php $__currentLoopData = (array)$ClotheList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo $row["WearType"]; ?></td>
                <td><?php echo $row["ImageFile"]; ?></td>
                <td><img src='Images/.'/'.<?php echo e($WearType); ?>/<?php if(isset( $row['ImageFile'] )): ?><?php echo e($row['ImageFile']); ?> <?php endif; ?>.png' width="300" height="300"></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
<br><hr><br>
<a href="<?php echo e(url('/closet')); ?>">Back to home</a>

    </body>
</html>

