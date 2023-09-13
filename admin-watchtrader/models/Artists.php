<?php

namespace app\models;

use Yii;

class Artists extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [['name','profile'],'safe'],
       ];
     
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artists';
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
            'profile' => 'Profile',

        ];
    }
   
 
   
}
