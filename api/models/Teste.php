<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "{{%teste}}".
 *
 * @property int $id
 * @property string $descricao
 * @property string $data
 * @property string $hora
 * @property int $id_disciplina_turma
 * @property int $id_professor
 *
 * @property Disciplinaturma $disciplinaTurma
 * @property Professor $professor
 */
class Teste extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%teste}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'data', 'hora', 'id_disciplina_turma', 'id_professor'], 'required'],
            [['data', 'hora'], 'safe'],
            [['id_disciplina_turma', 'id_professor'], 'integer'],
            [['descricao'], 'string', 'max' => 45],
            [['id_disciplina_turma'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplinaturma::className(), 'targetAttribute' => ['id_disciplina_turma' => 'id']],
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['id_professor' => 'id']],
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
            'id_professor' => 'Id Professor',
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
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['id' => 'id_professor']);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\query\TesteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \api\models\query\TesteQuery(get_called_class());
    }
}
