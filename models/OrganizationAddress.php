<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%organizationAddress}}".
 *
 * @property integer $id
 * @property integer $org_id
 * @property string $address1
 * @property string $address2
 * @property string $landmark
 * @property string $city
 * @property string $state
 * @property string $country
 * @property integer $pincode
 * @property double $latitude
 * @property double $longitude
 * @property string $location
 *
 * @property Organization $org
 */
class OrganizationAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%organizationAddress}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['org_id', 'pincode'], 'integer'],
            [['address1', 'landmark', 'city', 'state', 'country', 'pincode'], 'required'],
            [['address1', 'address2', 'location'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['landmark', 'city', 'state', 'country'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'org_id' => 'Org ID',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'landmark' => 'Landmark',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'pincode' => 'Pincode',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'location' => 'Location',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(Organization::className(), ['id' => 'org_id']);
    }

    public function beforeSave()
    {
        $location = $this->getLatLong($this->address1 . ',' . $this->address2 . ',' . $this->landmark . ',' . $this->city . ',' . $this->state . ',' . $this->country);
        $map = explode(',' ,$location);
        $this->latitude = $map[0];
        $this->longitude = $map[1];
        return true;
    }

    // function to get lat and long from the address
    function getLatLong($address){

        $address = str_replace(" ", "+", $address);

        $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false");
        $json = json_decode($json);

        $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
        return $lat.','.$long;
    }
}
