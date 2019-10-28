<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "teste".
 *
 * @property int $id
 * @property string $Descrição
 * @property string $Data
 * @property string $hora
 * @property int $ID_Disciplina_Turmas
 *
 * @property DisciplinaTurma $disciplinaTurmas
 */
class Teste extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teste';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Descrição', 'Data', 'hora', 'ID_Disciplina_Turmas'], 'required'],
            [['Data', 'hora'], 'safe'],
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
            'Data' => 'Data',
            'hora' => 'Hora',
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
