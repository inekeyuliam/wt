<?php 

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

class Model extends \yii\base\Model
{
    /**
     * Creates and populates a set of models.
     *
     * @param string $modelClass
     * @param array $multipleModels
     * @return array
     */
    public static function createMultiple($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];

        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'id', 'id'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['id']) && !empty($item['id']) && isset($multipleModels[$item['id']])) {
                    $models[] = $multipleModels[$item['id']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;


        
     }
    // public static function createMultiple($modelClass, $multipleModels = [], $data = null)
    // {
    //     $model    = new $modelClass;
    //     $formName = $model->formName();
    //     // added $data=null to function arguments
    //     // modified the following line to accept new argument
    //     $post     = empty($data) ? Yii::$app->request->post($formName) : $data[$formName];
    //     $models   = [];

    //     if (! empty($multipleModels)) {
    //         $keys = array_keys(ArrayHelper::map($multipleModels, 'id', 'id'));
    //         $multipleModels = array_combine($keys, $multipleModels);
    //     }

    //     if ($post && is_array($post)) {
    //         foreach ($post as $i => $item) {
    //             if (isset($item['id']) && !empty($item['id']) && isset($multipleModels[$item['id']])) {
    //                 $models[$i] = $multipleModels[$item['id']];
    //             } else {
    //                 $models[$i] = new $modelClass;
    //             }
    //         }
    //     }

    //     unset($model, $formName, $post);

    //     return $models;
    // }


}
?>