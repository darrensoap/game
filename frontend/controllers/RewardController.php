<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\UserNumber;
use frontend\models\Reward;
use Yii;

class RewardController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(Yii::$app->request->isPost)
        {
            $today = date('Y-m-d');
            
            $allUser = UserNumber::find()->where('time = :time' ,[':time' => $today ])->all();
            var_dump($allUser);exit;
        }
        return $this->render('index');
    }

}
