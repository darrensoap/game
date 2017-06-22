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
                * in condition of ranking
                * - 1st three correct with firstprice in asscending order
                * - 2rd three random correct with firstprice 
                * - 3th two random correct in firstprice
                * - consalation one random correct in firstprice
                * verify wheter user get which ranking
            */
            foreach($allUser as $k=>$userPrice)
            {
                $mergerUsernum = $userPrice->fNum.'.'.$userPrice->sNum.'.'.$userPrice->tNum;
                if($mergerUsernum == $firstPrice)
                {
                    $reward[$k]['id'] = $userPrice->userid;
                    $reward[$k]['name'] = 'First Price';
                    $reward[$k]['ranking'] = 1;
                    $reward[$k]['time'] = $userPrice->time;

                } else if((substr_count($mergerUsernum, $randomFirst) > 0) && (substr_count($mergerUsernum, $randomSecond) > 0) && (substr_count($mergerUsernum, $randomLst) > 0) ){
                    $reward[$k]['id'] = $userPrice->userid;
                    $reward[$k]['name'] = 'Second Price';
                    $reward[$k]['ranking'] = 2;
                    $reward[$k]['time'] = $userPrice->time;
                }
                else if ((substr_count($mergerUsernum, $randomFirst) > 0) && (substr_count($mergerUsernum, $randomSecond) > 0)){
                    $reward[$k]['id'] = $userPrice->userid;
                    $reward[$k]['name'] = 'Third Price';
                    $reward[$k]['ranking'] = 3;
                    $reward[$k]['time'] = $userPrice->time;
                }else if ((substr_count($mergerUsernum, $randomFirst) > 0 )) {
                    $reward[$k]['id'] = $userPrice->userid;
                    $reward[$k]['name'] = 'Consolation Price';
                    $reward[$k]['ranking'] = 4;
                    $reward[$k]['time'] = $userPrice->time;
                }
            }

            var_dump($reward);exit;
        }
        return $this->render('index');
    }

}
