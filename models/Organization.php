<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%organization}}".
 *
 * @property integer $id
 * @property resource $logo
 * @property string $logo_file_type
 * @property string $name
 * @property string $website
 * @property string $description
 * @property integer $org_type
 * @property string $org_type_text
 * @property integer $work_domain
 * @property string $work_domain_text
 * @property string $found_date
 * @property string $create_time
 * @property integer $user_id
 *
 * @property Job[] $jobs
 * @property User $user
 * @property OrganizationAddress[] $organizationAddresses
 * @property OrganizationWork $organizationWork
 */
class Organization extends \yii\db\ActiveRecord
{

    private static $_items=array();
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%organization}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['logo', 'description'], 'string'],
            [['name', 'description', 'org_type', 'work_domain', 'user_id'], 'required'],
            [['org_type', 'work_domain', 'user_id'], 'integer'],
            [['found_date', 'create_time'], 'safe'],
            [['logo_file_type', 'org_type_text', 'work_domain_text'], 'string', 'max' => 32],
            [['name', 'website'], 'string', 'max' => 128],
            [['name'], 'unique'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logo' => 'Logo',
            'logo_file_type' => 'Logo File Type',
            'name' => 'Name',
            'website' => 'Website',
            'description' => 'Description',
            'org_type' => 'Organization Type',
            'org_type_text' => 'Organization Type',
            'work_domain' => 'Work Domain',
            'work_domain_text' => 'Work Domain',
            'found_date' => 'Found Date',
            'create_time' => 'Create Time',
            'user_id' => 'User ID',
            'imageFile' => 'Logo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['org_id' => 'id']);
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
    public function getOrganizationAddresses()
    {
        return $this->hasMany(OrganizationAddress::className(), ['org_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationWork()
    {
        return $this->hasOne(OrganizationWork::className(), ['org_id' => 'id']);
    }

    public function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->create_time = date('Y-m-d H:i:s');
            $this->user_id = Yii::$app->user->id;
        }
        $this->org_type_text = Lookup::item("OrganizationType", $this->org_type);
        $this->work_domain_text = Lookup::item("WorkDomain", $this->work_domain);
        return true;
    }

    private static function loadItems($user_id)
    {
        self::$_items=array();
        $models=self::findAll([
            'user_id'=>$user_id,
        ]);
        foreach($models as $model)
            self::$_items[$model->id] = $model->name;
            //array_push(self::$_items, $model->name);
    }

    public static function getUserOrganizations($user_id)
    {
        self::loadItems($user_id);
        return self::$_items;
    }
}
