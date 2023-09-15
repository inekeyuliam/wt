<?php

namespace app\models;

use Yii;

class MasterCollectionItem extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [['item_id','collection_id'],'required'],
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
            'collection_id' => 'Collection'
        ];
    }
    public function getItem()
    {
        return $this->hasOne(MasterItems::classname(), ['id' => 'item_id']);
    }
    public function getCollection()
    {
        return $this->hasOne(MasterCollections::classname(), ['id' => 'collection_id']);
    }
   
}
