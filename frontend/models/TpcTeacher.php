<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\helpers\Html;

/**
 * This is the model class for table "{{%tpc}}".
 *
 * @property int $id
 * @property string $descricao
 * @property int $id_disciplina_turma
 * @property int $id_professor
 *
 * @property Disciplinaturma $disciplinaTurma
 * @property Professor $professor
 */
class TpcTeacher extends \yii\db\ActiveRecord
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
            'id_disciplina_turma' => 'Id Disciplina Turma',
            'id_professor' => 'Id Professor',
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'id_professor',
                'updatedByAttribute' => false,
            ]
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

    public function getEncondedDescricao()
    {
        return Html::encode($this->descricao);
    }
}
