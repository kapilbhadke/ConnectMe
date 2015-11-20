<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%userWorkExperience}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $organization
 * @property string $position
 * @property string $description
 * @property string $location
 * @property string $start_date
 * @property string $end_date
 *
 * @property User $user
 */
class UserWorkExperience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%userWorkExperience}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['organization', 'position', 'location', 'start_date'], 'required'],
            [['description'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['organization', 'position', 'location'], 'string', 'max' => 128]
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
            'organization' => 'Organization',
            'position' => 'Position',
            'description' => 'Description',
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
