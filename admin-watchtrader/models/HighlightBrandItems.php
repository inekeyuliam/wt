<?php

namespace app\models;

use Yii;

class HighlightBrandItems extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [['highlighted_brand_id','item_id'],'safe'],
       ];
     
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_highlight_brand_items';
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
            'highlighted_brand_id' => 'Brand',
            'item_id' => 'Item',

        ];
    }
    public function getItem()
    {
        return $this->hasOne(MasterItems::classname(), ['id' => 'item_id']);
    }
    public function getHighlightbrand()
    {
        return $this->hasOne(HighlightBrands::classname(), ['id' => 'highlighted_brand_id']);
    }
   
}
