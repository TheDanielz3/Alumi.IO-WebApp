<?php

namespace frontend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "disciplinaTurma".
 *
 * @property int $id
 * @property int $id_disciplina
 * @property int $id_turma
 *
 * @property Disciplina $disciplina
 * @property Turma $turma
 */
class DisciplinaTurma extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplinaTurma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_disciplina', 'id_turma'], 'integer'],
            [['id_disciplina'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['id_disciplina' => 'id']],
            [['id_turma'], 'exist', 'skipOnError' => true, 'targetClass' => Turma::className(), 'targetAttribute' => ['id_turma' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_disciplina' => 'Id Disciplina',
            'id_turma' => 'Id Turma',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id' => 'id_disciplina']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTurma()
    {
        return $this->hasOne(Turma::className(), ['id' => 'id_turma']);
    }
}
