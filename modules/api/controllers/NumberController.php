<?php

namespace app\modules\api\controllers;

use Yii;
use app\ext\TestTrait;
use app\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\Controller;

/**
 * Number controller for the `api` module
 */
class NumberController extends Controller
{
    use TestTrait;

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator']['class'] = HttpBasicAuth::class;
        $behaviors['authenticator']['auth'] = function ($username, $password) {
            $user = User::findOne([
                'username' => $username,
            ]);

            if (!$user) return null;

            return $user->validatePassword($password) ? $user : null;
        };

        return $behaviors;
    }

    public function actionGetNumberIndex() {
        $data = Yii::$app->request->post();
        return $this->getNumberIndex($data['number'], $data['numbers']);
    }
}
