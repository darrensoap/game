<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "eventtimestatus".
 *
 * @property integer $id
 * @property string $date
 * @property string $isCreate
 * @property string $createtime
 */
class Eventtimestatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eventtimestatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['isCreate'], 'string'],
            [['createtime'], 'safe'],
            [['date'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'isCreate' => 'Is Create',
            'createtime' => 'Createtime',
        ];
    }
}
