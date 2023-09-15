<?php

namespace app\models;

use Yii;

class MasterCollections extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [['name'],'required'],
         [['image_banner'],'safe']
       ];
     
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_collections';
    }
  
    /**
     * {@inheritdoc}
     */
 
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
        ];
    }
    public function getBrand()
    {
        return $this->hasOne(MasterBrands::classname(), ['id' => 'brand_id']);
    }
 
   
}
