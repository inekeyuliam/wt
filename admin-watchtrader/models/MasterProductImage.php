<?php

namespace app\models;

use Yii;

class MasterProductImage extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [['item_id'],'required'],
         [['image'],'safe']
       ];
     
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image_item';
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
            'item_id' => 'Item',
        ];
    }
    public function getItem()
    {
        return $this->hasOne(MasterItems::classname(), ['id' => 'item_id']);
    }
 
   
}
