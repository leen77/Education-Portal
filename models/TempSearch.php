<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Temp;

/**
 * TempSearch represents the model behind the search form about `frontend\models\Temp`.
 */
class TempSearch extends Temp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tempid', 'courseid'], 'integer'],
            [['topicname', 'pdf', 'video'], 'safe'],
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
        $query = Temp::find();

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
            'tempid' => $this->tempid,
            'courseid' => $this->courseid,
        ]);

        $query->andFilterWhere(['like', 'topicname', $this->topicname])
            ->andFilterWhere(['like', 'pdf', $this->pdf])
            ->andFilterWhere(['like', 'video', $this->video]);

        return $dataProvider;
    }
}
