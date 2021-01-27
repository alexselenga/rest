<?php

namespace app\commands;

use app\ext\TestTrait;
use app\models\Number;
use app\models\User;
use yii\console\Controller;
use yii\console\ExitCode;

class TestController extends Controller
{
    use TestTrait;

    public function actionIndex($number, $numbersStr, $user_id = null)
    {
        if (!$user_id || User::findIdentity($user_id)) {
            $numberIndex = $this->getNumberIndex($number, explode(' ', $numbersStr));

            $model = new Number;
            $model->user_id = $user_id;
            $model->number = $number;
            $model->numbers = $numbersStr;
            $model->number_index = $numberIndex;
            $model->save();

            echo "Индекс числа: $numberIndex";
            return ExitCode::OK;
        } else {
            echo 'Пользователь не авторизован';
            return ExitCode::NOUSER;
        }
    }
}
