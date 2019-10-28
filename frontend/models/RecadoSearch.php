<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Recado;

/**
 * RecadoSearch represents the model behind the search form of `frontend\models\Recado`.
 */
class RecadoSearch extends Recado
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_Turma', 'id_Aluno'], 'integer'],
            [['Data', 'Descrição'], 'safe'],
            [['Assinado'], 'number'],
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
        $query = Recado::find();

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
            'Data' => $this->Data,
            'Assinado' => $this->Assinado,
            'id_Turma' => $this->id_Turma,
            'id_Aluno' => $this->id_Aluno,
        ]);

        $query->andFilterWhere(['like', 'Descrição', $this->Descrição]);

        return $dataProvider;
    }
}
