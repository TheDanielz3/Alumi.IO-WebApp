<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "recado".
 *
 * @property int $id
 * @property string $data
 * @property string $descricao
 * @property float $assinado
 * @property int|null $id_turma
 * @property int|null $id_aluno
 * @property int $id_professor
 *
 * @property Aluno $aluno
 * @property Turma $turma
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
            [['data', 'descricao', 'assinado', 'id_professor'], 'required'],
            [['data'], 'safe'],
            [['assinado'], 'number'],
            [['id_turma', 'id_aluno', 'id_professor'], 'integer'],
            [['descricao'], 'string', 'max' => 150],
            [['id_aluno'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['id_aluno' => 'id']],
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
            'data' => 'Data',
            'descricao' => 'Descricao',
            'assinado' => 'Assinado',
            'id_turma' => 'Id Turma',
            'id_aluno' => 'Id Aluno',
            'id_professor' => 'Id Professor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Aluno::className(), ['id' => 'id_aluno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurma()
    {
        return $this->hasOne(Turma::className(), ['id' => 'id_turma']);
    }
}
