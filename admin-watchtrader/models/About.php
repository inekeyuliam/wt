<?php

namespace app\models;

use Yii;

class About extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [['content_short','content_long'],'safe'],
       ];
     
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about';
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
            'text_content' => 'Text Content',

        ];
    }
   
 
   
}
