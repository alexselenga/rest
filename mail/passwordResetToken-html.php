<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Здравствуйте <?= Html::encode($user->username) ?>,</p>

    <p>Пройдите по данной ссылке для подтверждения вашего пароля:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
