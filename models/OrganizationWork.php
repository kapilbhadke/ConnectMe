<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%organizationWork}}".
 *
 * @property integer $org_id
 * @property string $who
 * @property string $what
 * @property string $why
 * @property string $how
 * @property string $vision
 * @property string $mission
 * @property string $short_term_goals
 * @property string $long_term_goals
 *
 * @property Organization $org
 */
class OrganizationWork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%organizationWork}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['org_id'], 'required'],
            [['org_id'], 'integer'],
            [['who', 'what', 'why', 'how', 'vision', 'mission', 'short_term_goals', 'long_term_goals'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'org_id' => 'Org ID',
            'who' => 'Who are we?',
            'what' => 'What do we do?',
            'why' => 'Why do we do?',
            'how' => 'How do we do?',
            'vision' => 'Vision',
            'mission' => 'Mission',
            'short_term_goals' => 'Short Term Goals',
            'long_term_goals' => 'Long Term Goals',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(Organization::className(), ['id' => 'org_id']);
    }
}
