<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "recado".
 *
 * @property int $id
 * @property string $topico
 * @property string $descricao
 * @property float $assinado
 * @property int $data_hora
 * @property int $id_disciplina_turma
 * @property int|null $id_aluno
 * @property int $id_professor
 *
 * @property Aluno $aluno
 * @property Disciplinaturma $disciplinaTurma
 * @property Professor $professor
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
            [['topico', 'descricao', 'data_hora', 'id_disciplina_turma', 'id_professor', 'assinado'], 'required'],
            [['assinado'], 'number' , 'max' => 1, 'min' => 0],
            [['id_disciplina_turma', 'id_aluno', 'id_professor'], 'integer'],
            [['data_hora'], 'safe'],
            [['topico'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 200],
            [['id_aluno'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['id_aluno' => 'id']],
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
            'topico' => 'Topico',
            'descricao' => 'Descricao',
            'assinado' => 'Assinado',
            'data_hora' => 'Data Hora',
            'id_disciplina_turma' => 'Id Disciplina Turma',
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
}
