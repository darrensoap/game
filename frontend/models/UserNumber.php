<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "usernumber".
 *
 * @property integer $id
 * @property integer $fNum
 * @property integer $sNum
 * @property integer $tNum
 * @property integer $userid
 * @property string $isOn
 * @property string $time
 */
class UserNumber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usernumber';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fNum', 'sNum', 'tNum', 'userid'], 'integer'],
            [['isOn'], 'string'],
            [['time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fNum' => 'F Num',
            'sNum' => 'S Num',
            'tNum' => 'T Num',
            'userid' => 'Userid',
            'isOn' => 'Is On',
            'time' => 'Time',
        ];
    }
}
