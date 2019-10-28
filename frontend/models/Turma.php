<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "turma".
 *
 * @property int $id
 * @property int $Ano
 * @property string $Letra
 *
 * @property Aluno[] $alunos
 * @property DisciplinaTurma[] $disciplinaTurmas
 * @property Recado[] $recados
 */
class Turma extends \yii\db\ActiveRecord
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
            [['Ano', 'Letra'], 'required'],
            [['Ano'], 'integer'],
            [['Letra'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Ano' => 'Ano',
            'Letra' => 'Letra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunos()
    {
        return $this->hasMany(Aluno::className(), ['id_Turma' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaTurmas()
    {
        return $this->hasMany(DisciplinaTurma::className(), ['ID_Turmas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecados()
    {
        return $this->hasMany(Recado::className(), ['id_Turma' => 'id']);
    }
}
