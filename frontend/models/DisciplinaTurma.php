<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "disciplinaTurma".
 *
 * @property int $ID_Disciplinas
 * @property int $ID
 * @property int $ID_Turmas
 *
 * @property Turma $turmas
 * @property Disciplina $disciplinas
 * @property Teste[] $testes
 * @property Tpc[] $tpcs
 */
class DisciplinaTurma extends \yii\db\ActiveRecord
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
            [['ID_Disciplinas', 'ID', 'ID_Turmas'], 'required'],
            [['ID_Disciplinas', 'ID', 'ID_Turmas'], 'integer'],
            [['ID'], 'unique'],
            [['ID_Turmas'], 'exist', 'skipOnError' => true, 'targetClass' => Turma::className(), 'targetAttribute' => ['ID_Turmas' => 'id']],
            [['ID_Disciplinas'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['ID_Disciplinas' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_Disciplinas' => 'Id Disciplinas',
            'ID' => 'ID',
            'ID_Turmas' => 'Id Turmas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurmas()
    {
        return $this->hasOne(Turma::className(), ['id' => 'ID_Turmas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinas()
    {
        return $this->hasOne(Disciplina::className(), ['ID' => 'ID_Disciplinas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestes()
    {
        return $this->hasMany(Teste::className(), ['ID_Disciplina_Turmas' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpcs()
    {
        return $this->hasMany(Tpc::className(), ['ID_Disciplina_Turmas' => 'ID']);
    }
}
