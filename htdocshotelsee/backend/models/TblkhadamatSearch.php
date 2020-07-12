<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblkhadamat;

/**
 * TblkhadamatSearch represents the model behind the search form of `backend\models\Tblkhadamat`.
 */
class TblkhadamatSearch extends Tblkhadamat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_hotel', 'mobile', 'sms_notification'], 'integer'],
            [['category', 'name', 'phone', 'khadamat', 'location', 'roles', 'img', 'img_menu'], 'safe'],
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
        $query = Tblkhadamat::find()->where(['id_hotel'=>$flag]);

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
            'mobile' => $this->mobile,
            'sms_notification' => $this->sms_notification,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'khadamat', $this->khadamat])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'roles', $this->roles])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'img_menu', $this->img_menu]);

        return $dataProvider;
    }
}
