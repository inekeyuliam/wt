<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterItems;

/**
 * MasterJenisAktaSearch represents the model behind the search form of `app\models\MasterJenisAkta`.
 */
class MasterItemsSearch extends MasterItems
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nama','kode_barang','id_master_jenis','id'], 'safe'],
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
        $query = MasterItems::find()->orderBy(['id'=>SORT_ASC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_master_jenis' => $this->id_master_jenis,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
        ->andFilterWhere(['like', 'kode_barang', $this->kode_barang]);

        return $dataProvider;
    }
}
