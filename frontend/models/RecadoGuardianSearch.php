<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RecadoGuardian;

/**
 * RecadoGuardianSearch represents the model behind the search form of `app\models\RecadoGuardian`.
 */
class RecadoGuardianSearch extends RecadoGuardian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'data_hora', 'id_disciplina_turma', 'id_aluno', 'id_professor'], 'integer'],
            [['topico', 'descricao'], 'safe'],
            [['assinado'], 'number'],
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
        $query = RecadoGuardian::getValidRecados();

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
            'assinado' => $this->assinado,
            'data_hora' => $this->data_hora,
            'id_disciplina_turma' => $this->id_disciplina_turma,
            'id_aluno' => $this->id_aluno,
            'id_professor' => $this->id_professor,
        ]);

        $query->andFilterWhere(['like', 'topico', $this->topico])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
