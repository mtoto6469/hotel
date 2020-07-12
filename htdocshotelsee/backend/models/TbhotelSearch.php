<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tbhotel;

/**
 * TbhotelSearch represents the model behind the search form of `backend\models\Tbhotel`.
 */
class TbhotelSearch extends Tbhotel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'city_hotel_en', 'mobile_manager', 'time', 'time_end','hom_count'], 'integer'],
            [['name_hotel', 'name_hotel_en', 'name_manager_hotel', 'address_hotel', 'addrerss_hotel_en', 'city_hotel', 'status_star', 'phone', 'logo_hotel', 'date', 'general_information', 'general_information_en', 'space', 'space_en', 'roles', 'roles_en','cod_manager'], 'safe'],
            [['map_x', 'map_y'], 'number'],
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
        $query = Tbhotel::find();

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
            'city_hotel_en' => $this->city_hotel_en,
            'map_x' => $this->map_x,
            'map_y' => $this->map_y,
            'mobile_manager' => $this->mobile_manager,
            'date' => $this->date,
            'time' => $this->time,
            'time_end' => $this->time_end,
            'hom_count' => $this->hom_count,

        ]);

        $query->andFilterWhere(['like', 'name_hotel', $this->name_hotel])
            ->andFilterWhere(['like', 'name_hotel_en', $this->name_hotel_en])
            ->andFilterWhere(['like', 'cod_manager', $this->cod_manager])
            ->andFilterWhere(['like', 'name_manager_hotel', $this->name_manager_hotel])
            ->andFilterWhere(['like', 'address_hotel', $this->address_hotel])
            ->andFilterWhere(['like', 'addrerss_hotel_en', $this->addrerss_hotel_en])
            ->andFilterWhere(['like', 'city_hotel', $this->city_hotel])
            ->andFilterWhere(['like', 'status_star', $this->status_star])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'logo_hotel', $this->logo_hotel])
            ->andFilterWhere(['like', 'general_information', $this->general_information])
            ->andFilterWhere(['like', 'general_information_en', $this->general_information_en])
            ->andFilterWhere(['like', 'space', $this->space])
            ->andFilterWhere(['like', 'space_en', $this->space_en])
            ->andFilterWhere(['like', 'roles', $this->roles])
            ->andFilterWhere(['like', 'roles_en', $this->roles_en]);

        return $dataProvider;
    }
}
