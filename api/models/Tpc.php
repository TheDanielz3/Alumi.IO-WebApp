<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "{{%tpc}}".
 *
 * @property int $id
 * @property string $descricao
 * @property int $id_disciplina_turma
 *
 * @property Disciplinaturma $disciplinaTurma
 */
class Tpc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tpc}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'id_disciplina_turma'], 'required'],
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
            'id_disciplina_turma' => 'Id Disciplina Turma',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaTurma()
    {
        return $this->hasOne(Disciplinaturma::className(), ['id' => 'id_disciplina_turma']);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\query\TpcQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \api\models\query\TpcQuery(get_called_class());
    }
}
