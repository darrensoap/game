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
        /*
            verify wheter user finished today change
            if finshid back to index
            else create new model
         */
        $today = date('Y-m-d');
        $user = UserNumber::find()->where('userid = :id',[':id' => Yii::$app->user->identity->id])->one();
        if(empty($user))
        {
             $model = new UserNumber;
        }
        else{
            $userDate = Yii::$app->formatter->asDate($user->time, 'yyyy-MM-dd');
            if($userDate == $today)
            {
                return $this->redirect(['site/index']);
            }
            else{
                 $model = new UserNumber; 
            }
        }
       
        if(Yii::$app->request->isAjax){
            $data = Yii::$app->request->post();
            $model->fNum = $data['fnum'];
            $model->sNum = $data['snum'];
            $model->tNum = $data['tnum'];
            $model->userid = Yii::$app->user->identity->id;
            $model->date = date('Y-m-d');
            $model->time = date('h:i:s');
            $model->isOn = 1;
            $model->save();
        }
        return $this->render('index');
    }

}
