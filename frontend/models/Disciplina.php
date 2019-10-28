<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "disciplina".
 *
 * @property int $ID
 * @property string $Nome
 *
 * @property DisciplinaTurma[] $disciplinaTurmas
 * @property Professor[] $professors
 */
class Disciplina extends \yii\db\ActiveRecord
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
            [['Nome'], 'required'],
            [['Nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaTurmas()
    {
        return $this->hasMany(DisciplinaTurma::className(), ['ID_Disciplinas' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessors()
    {
        return $this->hasMany(Professor::className(), ['ID_Disciplina' => 'ID']);
    }
}
