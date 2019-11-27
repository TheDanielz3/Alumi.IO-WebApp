<?php

namespace frontend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "turma".
 *
 * @property int $id
 * @property int $ano
 * @property string $letra
 *
 * @property Aluno[] $alunos
 * @property DisciplinaTurma[] $disciplinaTurmas
 * @property Recado[] $recados
 */
class Turma extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'turma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ano', 'letra'], 'required'],
            [['ano'], 'integer'],
            [['letra'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ano' => 'Ano',
            'letra' => 'Letra',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getAlunos()
    {
        return $this->hasMany(Aluno::className(), ['id_turma' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getDisciplinaTurmas()
    {
        return $this->hasMany(DisciplinaTurma::className(), ['id_turma' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRecados()
    {
        return $this->hasMany(Recado::className(), ['id_turma' => 'id']);
    }
}
