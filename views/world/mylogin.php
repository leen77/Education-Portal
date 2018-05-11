<?php
use yii\helpers\Html;?>

<?= Html::csrfMetaTags() ?>
<form action="index.php?r=world/home" method="post">
UserLogin:<input type="text" name="uname">
<br><br>
Password:<input type="password" name="pass">
<br>
Remember me:<input type="checkbox" name="remem">
<br>
<input type="submit">
</form>