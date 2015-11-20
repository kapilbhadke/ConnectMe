<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jobContactPerson}}".
 *
 * @property integer $id
 * @property integer $job_id
 * @property string $name
 * @property string $email
 * @property string $phone
 *
 * @property Job $job
 */
class JobContactPerson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%jobContactPerson}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'name', 'email', 'phone'], 'required'],
            [['job_id'], 'integer'],
            [['name', 'email'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_id' => 'Job ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['id' => 'job_id']);
    }

}
