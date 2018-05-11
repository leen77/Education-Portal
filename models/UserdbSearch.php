<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Userdb;

/**
 * UserdbSearch represents the model behind the search form about `frontend\models\Userdb`.
 */
class UserdbSearch extends Userdb
{
    /**
     * @inheritdoc
     */
    public $userSearch;

    public function rules()
    {
        return [
            [['userid', 'roleid'], 'integer'],
            [['password', 'name', 'email', 'mobile', 'university', 'imgfile'], 'safe'],
             [['userSearch'], 'safe'],
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
        $query = Userdb::find();

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
            'userid' => $this->userid,
            //'roleid' => $this->roleid,
        ]);

        $query->andFilterWhere(['like', 'name', $this->userSearch]);

        return $dataProvider;
    }
}
