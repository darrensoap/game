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
        $todayDate = date('Y-m-d');
        $yesterday = date('Y-m-d 17:00:00', strtotime(' -1 day'));
        $today =  date('Y-m-d 17:00:00');
        
        $user = UserNumber::find()->where('userid = :id ',[':id' => Yii::$app->user->identity->id])->andwhere(['between', 'time', $yesterday, $today])->one();
        if(empty($user))
        {
             $model = new UserNumber;
        }
        else{
            $userDate = date('Y-m-d', strtotime($user->time));

            if($userDate == $todayDate)
            {
                 return $this->render('index' ,['user' => $user]);
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
            $model->isOn = 1;
            $model->save();
        }
        return $this->render('index');
    }

}
