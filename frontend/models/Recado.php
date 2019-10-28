<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "recado".
 *
 * @property int $id
 * @property string $Data
 * @property string $Descrição
 * @property double $Assinado
 * @property int $id_Turma
 * @property int $id_Aluno
 *
 * @property Turma $turma
 * @property Aluno $aluno
 */
class Recado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Data', 'Descrição', 'Assinado'], 'required'],
            [['Data'], 'safe'],
            [['Assinado'], 'number'],
            [['id_Turma', 'id_Aluno'], 'integer'],
            [['Descrição'], 'string', 'max' => 150],
            [['id_Turma'], 'exist', 'skipOnError' => true, 'targetClass' => Turma::className(), 'targetAttribute' => ['id_Turma' => 'id']],
            [['id_Aluno'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['id_Aluno' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Data' => 'Data',
            'Descrição' => 'Descrição',
            'Assinado' => 'Assinado',
            'id_Turma' => 'Id Turma',
            'id_Aluno' => 'Id Aluno',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurma()
    {
        return $this->hasOne(Turma::className(), ['id' => 'id_Turma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Aluno::className(), ['id' => 'id_Aluno']);
    }
}
