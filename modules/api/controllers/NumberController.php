<?php

namespace app\modules\api\controllers;

use Yii;
use app\ext\TestTrait;
use app\models\Number;
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

            if (!$user) {
                return null;
            }

            return $user->validatePassword($password) ? $user : null;
        };

        return $behaviors;
    }

    public function actionGetNumberIndex() {
        $data = Yii::$app->request->post();
        $number = $data['number'];
        $numbers = $data['numbers'];
        $numberIndex = $this->getNumberIndex($number, $numbers);

        $model = new Number;
        $model->user_id = Yii::$app->user->identity->id;
        $model->number = $number;
        $model->numbers = implode(',', $numbers);
        $model->number_index = $numberIndex;
        $model->save();

        return $numberIndex;
    }
}
