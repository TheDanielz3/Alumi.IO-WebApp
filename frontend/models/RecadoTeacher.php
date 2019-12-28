<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "{{%recado}}".
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
 * @property Professor $professor
 * @property Disciplinaturma $disciplinaTurma
 */
class RecadoTeacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%recado}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['topico', 'descricao', 'id_disciplina_turma'], 'required'],
            [['assinado'], 'number'],
            [['data_hora'],'safe'],
            [[ 'id_disciplina_turma', 'id_aluno', 'id_professor'], 'integer'],
            [['topico'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 200],
            [['id_aluno'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['id_aluno' => 'id']],
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['id_professor' => 'id']],
            [['id_disciplina_turma'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplinaturma::className(), 'targetAttribute' => ['id_disciplina_turma' => 'id']],];
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

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'data_hora',
                'updatedAtAttribute' => false,
            ],
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

    public function getEncondedTopico()
    {
        return Html::encode($this->topico);
    }

    public function getEncondedDescricao()
    {
        return Html::encode($this->descricao);
    }

    public static function getIDTurma($id_disciplina_turma)
    {

        if (!empty($id_disciplina_turma)) {
            $id_turma = Disciplinaturma::find()->andWhere('id=' . $id_disciplina_turma)->one();
            return $id_turma->id_turma;
        }
        return null;
    }
}
