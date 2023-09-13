<?php

namespace app\models;

use Yii;

class HighlightBrands extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [['brand_id','name'],'safe'],
       ];
     
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_highlight_brands';
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
            'brand_id' => 'Brand',
        ];
    }
    public function getBrand()
    {
        return $this->hasOne(MasterBrands::classname(), ['id' => 'brand_id']);
    }
 
   
}
