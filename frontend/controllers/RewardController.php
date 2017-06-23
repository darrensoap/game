<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\UserNumber;
use frontend\models\Reward;
use frontend\models\Eventtimestatus;
use common\models\User;
use yii\data\Pagination;
use Yii;

class RewardController extends \yii\web\Controller
{
    public function actionIndex()
    {
        /*
         *detect wheter is today or yesterday
         */
        $yesterday = date('Y-m-d 17:00:00', strtotime(' -1 day'));
        $today =  date('Y-m-d 17:00:00');
        $userReward = Reward::find()->where(['between', 'rewardTime', $yesterday, $today]);
        $pager = $this->Pager($userReward);
        $userReward = $this->PagePagination($userReward,$pager);
        
        if(empty($userReward))
        {
            $beforeYesterday = date('Y-m-d 17:00:00', strtotime(' -2 day'));
            $userReward = Reward::find()->where(['between' , 'rewardTime' , $beforeYesterday , $yesterday]);
            $pager = $this->Pager($userReward);
            $userReward = $this->PagePagination($userReward,$pager);
        }
        /*
         *detect whether is the first day or event start?
         */
        
        if(empty($userReward))
        {
             return $this->render('index');
        }

        $rewards = $this->Sorting($userReward);
        /*
         *get ranking name from Reward Model
         */
        $ranking = Reward::$ranking;
        foreach($rewards as $data)
        {
            $data['rewardStatus'] = $ranking[$data['rewardStatus']];
            $data['username'] = User::find()->where('id = :id' ,[':id' => $data['userid']])->one()->username;
        }
        
        if(Yii::$app->request->isAjax)
        {
            /*
             *detect condtion create table
             */
            $todayCreate = Eventtimestatus::find()->where('date = :date and isCreate = :crt' ,[':date' => date('Y-m-d') ,':crt' => '1' ])->one();
            if(empty($todayCreate))
            {
                $allUser = UserNumber::find()->where(['between', 'time', $yesterday, $today])->orderBy('time')->all();
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
                        $reward[$k]['price'] = 100;
                        $reward[$k]['ranking'] = 1;
                        $reward[$k]['time'] = $userPrice->time;

                    } else if((substr_count($mergerUsernum, $randomFirst) > 0) && (substr_count($mergerUsernum, $randomSecond) > 0) && (substr_count($mergerUsernum, $randomLst) > 0) ){
                        $reward[$k]['id'] = $userPrice->userid;
                        $reward[$k]['price'] = 50;
                        $reward[$k]['ranking'] = 2;
                        $reward[$k]['time'] = $userPrice->time;
                    }
                    else if ((substr_count($mergerUsernum, $randomFirst) > 0) && (substr_count($mergerUsernum, $randomSecond) > 0)){
                        $reward[$k]['id'] = $userPrice->userid;
                        $reward[$k]['price'] = 10;
                        $reward[$k]['ranking'] = 3;
                        $reward[$k]['time'] = $userPrice->time;
                    }else if ((substr_count($mergerUsernum, $randomFirst) > 0 )) {
                        $reward[$k]['id'] = $userPrice->userid;
                        $reward[$k]['price'] = 2;
                        $reward[$k]['ranking'] = 4;
                        $reward[$k]['time'] = $userPrice->time;
                    }
                }

                foreach($reward as $data)
                {
                    $model = new Reward;
                    $model->price = $data['price'];
                    $model->rewardStatus = $data['ranking'];
                    $model->userid = $data['id'];
                    $model->rewardTime = $data['time'];
                    $model->save();
                }
                /*
                 *create a record to validate
                 *userNumber table create?
                 */
                $recordToday = new Eventtimestatus;
                $recordToday->date = date('Y-m-d');
                $recordToday->isCreate = 1;
                $recordToday->save(false);
            }

        }
        
       return $this->render("index" , ['rewards' => $rewards , 'pager' => $pager]);
    }

    public function Sorting($userReward)
    {
        $sizeReward = count($userReward);

         /*
          *sorting ranking
          */
        for($i=0 ; $i<$sizeReward ; $i++)
        {
            for($j=0 ; $j<$sizeReward ; $j++)
            {
                if($userReward[$i]['rewardStatus'] < $userReward[$j]['rewardStatus'] )
                {
                    $temp = $userReward[$i];
                    $userReward[$i] = $userReward[$j];
                    $userReward[$j] = $temp;
                }
            }

        }
        return $userReward;
    }
    
    public function Pager($data)
    {
        $count = count($data);
        $pageSize = Yii::$app->params['pageSize']['reward'];
        $pager = new Pagination(['totalCount' => $count , 'pageSize' => $pageSize]);
        
        return $pager;
    }
    
    public function PagePagination($data, $pager)
    {
        $data = $data->offset($pager->offset)->limit($pager->limit)->all();
        return $data;
    }


    public function actionReward()
    {
        $model = Reward::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['pageSize']['reward'];
        $pager = new Pagination(['totalCount' => $count , 'pageSize' => $pageSize]);
        $rewards = $model->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("index" , ['rewards' => $rewards , 'pager' => $pager]);
    }

}
