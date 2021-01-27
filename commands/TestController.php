<?php

namespace app\commands;

use app\ext\TestTrait;
use yii\console\Controller;
use yii\console\ExitCode;

class TestController extends Controller
{
    use TestTrait;

    public function actionIndex($number, $numbers)
    {
        echo 'Индекс числа: ' . $this->getNumberIndex($number, explode(' ', $numbers));
        return ExitCode::OK;
    }
}
