<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%job}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $org_id
 * @property string $title
 * @property string $description
 * @property string $location
 * @property integer $job_type
 * @property integer $employment_type
 * @property integer $work_domain
 * @property string $required_skills
 * @property string $required_education
 * @property string $create_date
 * @property string $deadline_date
 * @property string $start_date
 * @property string $end_date
 *
 * @property Organization $org
 * @property User $user
 * @property JobApplication[] $jobApplications
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%job}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'description', 'location', 'start_date'], 'required'],
            [['user_id', 'org_id', 'job_type', 'employment_type', 'work_domain'], 'integer'],
            [['title', 'description', 'location', 'required_skills', 'required_education'], 'string'],
            [['create_date', 'deadline_date', 'start_date', 'end_date'], 'safe']
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
            'org_id' => 'Organization',
            'title' => 'Title',
            'description' => 'Description',
            'location' => 'Location',
            'job_type' => 'Task/Job Type',
            'employment_type' => 'Employment Type',
            'work_domain' => 'Work Domain',
            'required_skills' => 'Required Skills',
            'required_education' => 'Required Education',
            'create_date' => 'Create Date',
            'deadline_date' => 'Application last date',
            'start_date' => 'When',
            'end_date' => 'To',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(Organization::className(), ['id' => 'org_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobApplications()
    {
        return $this->hasMany(JobApplication::className(), ['job_id' => 'id']);
    }

    public function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->create_date = date('Y-m-d H:i:s');
            $this->user_id = Yii::$app->user->id;
        }
        return true;
    }
}
