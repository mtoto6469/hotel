<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblprofile;

/**
 * TblprofileSearch represents the model behind the search form of `backend\models\Tblprofile`.
 */
class TblprofileSearch extends Tblprofile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_hotel', 'count_peapel'], 'integer'],
            [['name', 'lastname', 'mobile', 'rome_number', 'img', 'date_enter', 'date_exit', 'cod_manager', 'role', 'date_enter_id', 'date_exit_ir', 'username','phase'], 'safe'],
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
    public function search($params,$id)
    {
        $query = Tblprofile::find()->where(['id_hotel'=>$id])->andWhere(['role'=>'user']);

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
            'id_user' => $this->id_user,
            'id_hotel' => $this->id_hotel,
            'count_peapel' => $this->count_peapel,
            'date_enter' => $this->date_enter,
            'date_exit' => $this->date_exit,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'phase', $this->phase])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'rome_number', $this->rome_number])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'cod_manager', $this->cod_manager])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'date_enter_id', $this->date_enter_id])
            ->andFilterWhere(['like', 'date_exit_ir', $this->date_exit_ir])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }



    public function search2($params,$id)
    {
        $query = Tblprofile::find()->where(['id_hotel'=>$id])->andWhere(['role'=>'employee']);

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
            'id_user' => $this->id_user,
            'id_hotel' => $this->id_hotel,
            'count_peapel' => $this->count_peapel,
            'date_enter' => $this->date_enter,
            'date_exit' => $this->date_exit,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'phase', $this->phase])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'rome_number', $this->rome_number])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'cod_manager', $this->cod_manager])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'date_enter_id', $this->date_enter_id])
            ->andFilterWhere(['like', 'date_exit_ir', $this->date_exit_ir])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
