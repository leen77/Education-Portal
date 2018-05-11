<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Enroll;

/**
 * EnrollSearch represents the model behind the search form about `frontend\models\Enroll`.
 */
class EnrollSearch extends Enroll
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enrollid', 'tempid', 'userid', 'likes'], 'integer'],
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
        $query = Enroll::find();

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
            'enrollid' => $this->enrollid,
            'tempid' => $this->tempid,
            'userid' => $this->userid,
            'likes' => $this->likes,
        ]);

        return $dataProvider;
    }
}
