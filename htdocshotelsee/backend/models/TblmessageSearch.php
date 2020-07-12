<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblmessage;

/**
 * TblmessageSearch represents the model behind the search form of `frontend\models\Tblmessage`.
 */
class TblmessageSearch extends Tblmessage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_hotel', 'id_user','visit'], 'integer'],
            [['text'], 'safe'],
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
        $query = Tblmessage::find()->where(['id_hotel'=>$flag]);

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
            'id_user' => $this->id_user,
            'visit' => $this->visit,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
