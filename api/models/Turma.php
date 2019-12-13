<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "{{%turma}}".
 *
 * @property int $id
 * @property int $ano
 * @property string $letra
 *
 * @property Aluno[] $alunos
 * @property Disciplinaturma[] $disciplinaturmas
 * @property Recado[] $recados
 */
class Turma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%turma}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ano', 'letra'], 'required'],
            [['ano'], 'integer'],
            [['letra'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ano' => 'Ano',
            'letra' => 'Letra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunos()
    {
        return $this->hasMany(Aluno::className(), ['id_turma' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaturmas()
    {
        return $this->hasMany(Disciplinaturma::className(), ['id_turma' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecados()
    {
        return $this->hasMany(Recado::className(), ['id_turma' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\query\TurmaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \api\models\query\TurmaQuery(get_called_class());
    }
}
