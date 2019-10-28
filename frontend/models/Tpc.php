<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tpc".
 *
 * @property int $id
 * @property string $Descrição
 * @property int $ID_Disciplina_Turmas
 *
 * @property DisciplinaTurma $disciplinaTurmas
 */
class Tpc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tpc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Descrição', 'ID_Disciplina_Turmas'], 'required'],
            [['ID_Disciplina_Turmas'], 'integer'],
            [['Descrição'], 'string', 'max' => 45],
            [['ID_Disciplina_Turmas'], 'exist', 'skipOnError' => true, 'targetClass' => DisciplinaTurma::className(), 'targetAttribute' => ['ID_Disciplina_Turmas' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Descrição' => 'Descrição',
            'ID_Disciplina_Turmas' => 'Id Disciplina Turmas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaTurmas()
    {
        return $this->hasOne(DisciplinaTurma::className(), ['ID' => 'ID_Disciplina_Turmas']);
    }
}
