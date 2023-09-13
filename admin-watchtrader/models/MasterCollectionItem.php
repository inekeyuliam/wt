<?php

namespace app\models;

use Yii;

class MasterCollections extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [['item_id'],'safe'],
       ];
     
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_collection_item';
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
    public function getItems()
    {
        return $this->hasOne(MasterItems::classname(), ['id' => 'item_id']);
    }
 
   
}
