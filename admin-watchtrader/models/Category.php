<?php

namespace app\models;

use Yii;

class Category extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [['brandsid','name'],'safe'],
       ];
     
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
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
            'brandsid' => 'Brand'
        ];
    }
    public function getBrand()
    {
        return $this->hasOne(Brands::classname(), ['id' => 'brandsid']);
        // $attendee = EventAttendee::find()->where(['id_customer'=>$this->id])->orderby(['created_at'=>SORT_DESC])->one();
        // return $attendee;
    }
    
 
   
}
