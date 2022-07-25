<?php

namespace app\controllers;

use app\models\Form;
use yii\rest\ActiveController;

class FormController extends ActiveController
{
    public $modelClass = Form::class;

    public function behaviors()
    {
        $behaviours = parent::behaviors();

        $auth = $behaviours['authenticator'];
        unset($behaviours['authenticator']);

        $behaviours['authenticator'] = $auth;
        $behaviours['authenticator']['except'] = ['options'];

        return \yii\helpers\ArrayHelper::merge([
            [
                'class' => \yii\filters\Cors::class,
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Allow-Origin' => ['*'],
                    'Access-Control-Request-Method' => ['POST', 'GET', 'OPTIONS'],
                    'Access-Control-Request-Headers' => ['*'],
                ],
            ],
        ], $behaviours);
    }

}
