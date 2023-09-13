<?php

namespace app\models;

use Yii;

class Contact extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [['office','googlemaps','phone','whatsapp','email','instagram','facebook','twitter','youtube'],'safe'],
       ];
     
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
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
            'office' => 'Office',
            'googlemaps' => 'Google Maps',

        ];
    }
   
 
   
}
