<?php

namespace app\models;

use Yii;

class Home extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [['youtube_url','youtube_title'],'safe'],
       ];
     
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'home';
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
            'youtube_url' => 'URL',
            'youtube_title' => 'Title',
        ];
    }
   
 
   
}
