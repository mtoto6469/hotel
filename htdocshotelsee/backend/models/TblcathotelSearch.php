<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblcathotel;

/**
 * TblcathotelSearch represents the model behind the search form of `backend\models\Tblcathotel`.
 */
class TblcathotelSearch extends Tblcathotel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','position'], 'integer'],
            [['title_en','title', 'logo', 'id_hotel'], 'safe'],
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
        $query = Tblcathotel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $query->joinWith('idHotel')->andWhere([
            Tblcathotel::tableName().'.id_hotel' =>$flag,

        ]);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
//            'id_hotel' => $this->id_hotel,
            'position' => $this->position,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like','tbhotel.name_hotel',$this->id_hotel]);

        return $dataProvider;
    }
}
