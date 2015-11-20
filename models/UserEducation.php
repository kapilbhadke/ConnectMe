<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%userEducation}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $institute
 * @property string $degree
 * @property string $area
 * @property string $location
 * @property string $start_date
 * @property string $end_date
 *
 * @property User $user
 */
class UserEducation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%userEducation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['institute', 'degree', 'area', 'location', 'start_date'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['institute', 'degree', 'area', 'location'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'institute' => 'Institute',
            'degree' => 'Degree',
            'area' => 'Area',
            'location' => 'Location',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
