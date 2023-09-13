<?php

namespace app\models;

use Yii;

class Product extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [['brandid','categoryid','description','name','youtube'],'safe'],
       ];
     
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
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
            'brandid' => 'Brand',
            'categoryid' => 'Category',
            'description' => 'Description',
            'youtube' => 'Youtube'

        ];
    }
    public function getBrand()
    {
        return $this->hasOne(Brands::classname(), ['id' => 'brandid']);
    }
    public function getCategory()
    {
        return $this->hasOne(Category::classname(), ['id' => 'categoryid']);
    }
 
   
}
