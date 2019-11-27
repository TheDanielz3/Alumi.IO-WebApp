<?php

namespace frontend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "disciplina".
 *
 * @property int $id
 * @property string $nome
 *
 * @property DisciplinaTurma[] $disciplinaTurmas
 * @property Professor[] $professors
 */
class Disciplina extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplina';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getDisciplinaTurmas()
    {
        return $this->hasMany(DisciplinaTurma::className(), ['id_disciplina' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProfessors()
    {
        return $this->hasMany(Professor::className(), ['id_disciplina' => 'id']);
    }
}
