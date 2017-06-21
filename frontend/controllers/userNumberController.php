<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\UserNumber;
use common\models\User;

class UsernumberController extends \yii\web\Controller
{
    public function actionIndex()
    {
      
        if(Yii::$app->user->isGuest)
        {
            return $this->redirect(['site/login']);
        }
        $model = new UserNumber;
        if(Yii::$app->request->isAjax){
            $data = Yii::$app->request->post();
            $model->fNum = $data['fnum'];
            $model->sNum = $data['snum'];
            $model->tNum = $data['tnum'];
            $model->userid = Yii::$app->user->identity->id;
            $model->isOn = 1;
            $model->save(false);
        }
        return $this->render('index');
    }

}
