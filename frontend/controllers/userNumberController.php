<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\UserNumber;

class UsernumberController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new UserNumber;
        if(Yii::$app->request->isAjax){
            $data = Yii::$app->request->post();
            $model->fNum = $data['value'];
            $model->load($data);
            $model->save(false);
        }
        return $this->render('index');
    }

}
