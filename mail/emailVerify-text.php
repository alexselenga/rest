<?php

/* @var $this yii\web\View */
/* @var $user app\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Здравствуйте <?= $user->username ?>,

Пройдите по данной ссылке для подтверждения вашего профиля:

<?= $verifyLink ?>
