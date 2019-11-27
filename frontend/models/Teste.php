<?php

namespace frontend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "teste".
 *
 * @property int $id
 * @property string $descricao
 * @property string $data
 * @property string $hora
 * @property int $id_disciplina_turma
 *
 * @property Disciplinaturma $disciplinaTurma
 */
class Teste extends ActiveRecord
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
            [['descricao', 'data', 'hora'], 'required'],
            [['data', 'hora'], 'safe'],
            [['id_disciplina_turma'], 'integer'],
            [['descricao'], 'string', 'max' => 45],
            [['id_disciplina_turma'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplinaturma::className(), 'targetAttribute' => ['id_disciplina_turma' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'data' => 'Data',
            'hora' => 'Hora',
            'id_disciplina_turma' => 'Id Disciplina Turma',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getDisciplinaTurma()
    {
        return $this->hasOne(Disciplinaturma::className(), ['id' => 'id_disciplina_turma']);
    }
}
