<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterCollectionItem;

/**
 * MasterUserSearch represents the model behind the search form of `app\models\MasterUser`.
 */
class MasterCollectionItemSearch extends MasterCollectionItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id','collection_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MasterCollectionItem::find()->where(['flag'=>1])->orderBy(['id'=>SORT_ASC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'item_id' => $this->item_id,
            'collection_id' => $this->collection_id
        ]);
        

        return $dataProvider;
    }
}
