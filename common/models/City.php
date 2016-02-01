<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $ID
 * @property string $Name
 * @property string $CountryCode
 * @property string $District
 * @property integer $Population
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Population'], 'integer'],
            [['Name'], 'string', 'max' => 35],
            [['CountryCode'], 'string', 'max' => 3],
            [['District'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Name' => 'Name',
            'CountryCode' => 'Country Code',
            'District' => 'District',
            'Population' => 'Population',
        ];
    }
}
