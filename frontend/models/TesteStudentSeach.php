<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TesteStudent;
use yii\helpers\VarDumper;

/**
 * TesteStudentSeach represents the model behind the search form of `\app\models\TesteStudent`.
 */
class TesteStudentSeach extends TesteStudent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'data_hora', 'id_disciplina_turma', 'id_professor'], 'integer'],
            [['descricao'], 'safe'],
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
        $currentStudent =  Aluno::find()->andWhere('id=' . \Yii::$app->user->id)->one();
        $currentDisciplinasTurmas = Disciplinaturma::find()->andWhere(['id_turma' => $currentStudent->id_turma])->all();

        for ($i = 0; $i < count($currentDisciplinasTurmas); $i++){
            $currentDisciplinasTurmasIDS[$i] = $currentDisciplinasTurmas[$i]->id;
        }

        $query = TesteStudent::find()->orderBy(['data_hora' => SORT_DESC])->andWhere(['id_disciplina_turma' => $currentDisciplinasTurmasIDS ] );

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
            'data_hora' => $this->data_hora,
            'id_disciplina_turma' => $this->id_disciplina_turma,
            'id_professor' => $this->id_professor,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
