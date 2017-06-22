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
            $yesterday = date('Y-m-d 17:00:00', strtotime(' -1 day'));
            $today =  date('Y-m-d 17:00:00');
            $allUser = UserNumber::find()->where(['between', 'time', $yesterday, $today])->all();
            //$randomFirst = rand(1,99);
            //$randomSecond = rand(1,99);
            //$randomLst = rand(1,99);
            $randomFirst = 69;
            $randomSecond = 85;
            $randomLst = 49;
            $firstPrice = $randomFirst.'.'.$randomSecond.'.'.$randomLst;
            
            $reward = [];
            /*
                * merge alluser number together
                * verify wheter user get first price
                * if got more user get same first price
                * arrange using who come who first
            */
            foreach($allUser as $k=>$userPrice)
            {
                $mergerUsernum = $userPrice->fNum.'.'.$userPrice->sNum.'.'.$userPrice->tNum;
                if($mergerUsernum == $firstPrice)
                {
                    $reward[$k]['id'] = $userPrice->userid;
                    $reward[$k]['name'] = 'First Price';
                    $reward[$k]['time'] = $userPrice->time;
                }
                elseif(preg_match('/$userPrice->fNum/',$firstPrice ) && preg_match('/$userPrice->sNum/',$firstPrice)  && preg_match('/$userPrice->tNum/',$firstPrice ))
                {
                    $reward[$k]['id'] = $userPrice->userid;
                    $reward[$k]['name'] = 'Second Price';
                    $reward[$k]['time'] = $userPrice->time;
                }
            }
        
            var_dump($reward);exit;
        }
        return $this->render('index');
    }

}
