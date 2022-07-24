<?php

namespace app\controllers;

use app\models\Form;
use yii\rest\ActiveController;

class FormController extends ActiveController
{
    public $modelClass = Form::class;

}
