<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%userProfile}}".
 *
 * @property integer $user_id
 * @property string $about
 * @property string $hobbies
 * @property string $skills
 * @property string $languages
 * @property string $birth_date
 *
 * @property User $user
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%userProfile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['birth_date'], 'safe'],
            [['about', 'hobbies', 'skills', 'languages'], 'string', 'max' => 4096]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'about' => 'Summary',
            'hobbies' => 'Hobbies',
            'skills' => 'Skills',
            'languages' => 'Languages',
            'birth_date' => 'Birth Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->user_id = Yii::$app->user->id;
        }
        return true;
    }
}
