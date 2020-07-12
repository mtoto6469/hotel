<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tbldes;

/**
 * TbldesSearch represents the model behind the search form of `backend\models\Tbldes`.
 */
class TbldesSearch extends Tbldes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_hotel'], 'integer'],
            [['logo', 'title', 'text', 'id_khadamat'], 'safe'],
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
    public function search($params,$flag)
    {
        $query = Tbldes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $query->joinWith('idKhadamat')->where([
            Tbldes::tableName().'.id_hotel' =>$flag,
        ]);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_hotel' => $this->id_hotel,
//            'id_khadamat' => $this->id_khadamat,
        ]);

        $query->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like','tblkhadamat.name',$this->id_khadamat]);

        return $dataProvider;
    }
}
