<?php

namespace app\frontend\models;

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
            [['price', 'userid'], 'integer'],
            [['rewardTime'], 'safe'],
            [['rewardStatus'], 'string', 'max' => 255],
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
