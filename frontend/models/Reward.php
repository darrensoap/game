<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reward".
 *
 * @property integer $id
 * @property integer $price
 * @property string $rewardStatus
 * @property integer $userid
 * @property string $rewardTime
 */
class Reward extends \yii\db\ActiveRecord
{
    const FIRSTPRICE = 1;
    const SECONDPRICE = 2;
    const THRIDPRICE = 3;
    const CONSOLATIONPRICE = 4;
    
    public $username;
    public static $ranking = [
        self::FIRSTPRICE => 'First Price',
        self::SECONDPRICE => 'Second Price',
        self::THRIDPRICE => 'Third Price',
        self::CONSOLATIONPRICE => 'Consolation Price',
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reward';
    }

    /**
     * @inheritdoc
     */
    
    public function rules()
    {
        return [
            [['price', 'rewardStatus', 'userid'], 'required'],
            [['price', 'userid' ,'rewardStatus'], 'integer'],
            [['rewardTime'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'rewardStatus' => 'Reward Status',
            'userid' => 'Userid',
            'rewardTime' => 'Reward Time',
        ];
    }
}
