<?php

namespace app\models;

use Yii;

class Main extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [['title','subtitle'],'safe'],
       ];
     
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main';
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
            'title' => 'Title',
            'subtitle' => 'Subtitle',

        ];
    }
   
 
   
}
