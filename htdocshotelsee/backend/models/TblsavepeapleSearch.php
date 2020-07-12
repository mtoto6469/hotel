<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblsavepeaple;

/**
 * TblsavepeapleSearch represents the model behind the search form of `backend\models\Tblsavepeaple`.
 */
class TblsavepeapleSearch extends Tblsavepeaple
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_hotel'], 'integer'],
            [['name', 'tell', 'namehotel', 'date_enter', 'date_enter_ir', 'date_exit', 'date_exit_ir'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Tblsavepeaple::find();

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
            'id' => $this->id,
            'id_hotel' => $this->id_hotel,
            'date_enter' => $this->date_enter,
            'date_exit' => $this->date_exit,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tell', $this->tell])
            ->andFilterWhere(['like', 'namehotel', $this->namehotel])
            ->andFilterWhere(['like', 'date_enter_ir', $this->date_enter_ir])
            ->andFilterWhere(['like', 'date_exit_ir', $this->date_exit_ir]);

        return $dataProvider;
    }
}
