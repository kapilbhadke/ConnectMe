<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%userAddress}}".
 *
 * @property integer $user_id
 * @property string $address1
 * @property string $address2
 * @property string $landmark
 * @property string $city
 * @property string $state
 * @property string $country
 * @property integer $pincode
 *
 * @property User $user
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%userAddress}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'address1', 'landmark', 'city', 'state', 'country', 'pincode'], 'required'],
            [['user_id', 'pincode'], 'integer'],
            [['address1', 'address2'], 'string'],
            [['landmark', 'city', 'state', 'country'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'landmark' => 'Landmark',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'pincode' => 'Pincode',
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
