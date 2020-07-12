<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblsans;

/**
 * TblsansSearch represents the model behind the search form of `backend\models\Tblsans`.
 */
class TblsansSearch extends Tblsans
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_hotel'], 'integer'],
            [['day_of_weeken', 'time', 'women_men', 'descrition', 'id_khadamat'], 'safe'],
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
    public function search($params,$flag)
    {
        $query = Tblsans::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $query->joinWith('idKhadamat')->where([
            Tblsans::tableName().'.id_hotel' =>$flag,
        ]);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
//            'id_khadamat' => $this->id_khadamat,
            'id_hotel' => $this->id_hotel,
        ]);

        $query->andFilterWhere(['like', 'day_of_weeken', $this->day_of_weeken])
            ->andFilterWhere(['like', 'time', $this->time])
            ->andFilterWhere(['like', 'women_men', $this->women_men])
            ->andFilterWhere(['like', 'descrition', $this->descrition])
            ->andFilterWhere(['like','tblkhadamat.name',$this->id_khadamat]);

        return $dataProvider;
    }
}
