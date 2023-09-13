<?php

namespace app\models;

use Yii;

class Config extends \yii\db\ActiveRecord
{
    public function rules() {
      return [       
         [[
            'meta_title',
            'meta_author',
            'meta_copyright',
            'meta_keywords',
            'meta_description',
            'googleanalytics',
            'sidebar_title',
            'sidebar_description',
            'menu_about_title',
            'menu_about_subtitle',
            'menu_newarrivals_title',
            'menu_newarrivals_subtitle',
            'menu_lastevent_title',
            'menu_lastevent_subtitle',
            'menu_artists_title',
            'menu_artists_subtitle',
            'menu_dealers_title',
            'menu_dealers_subtitle',
            'menu_contact_title',
            'menu_contact_subtitle',
            'menu_contact_formtitle',
            'menu_followus_title',
            'menu_office_title',
            'link_scrolldown_title',
            'link_backtotop_title'
        ],'safe'],
       ];
     
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config';
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
