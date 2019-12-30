<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

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
 * @property Disciplinaturma $disciplinaTurma
 * @property Professor $professor
 */
class RecadoGuardian extends \yii\db\ActiveRecord
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
            [['topico', 'descricao', 'data_hora', 'id_disciplina_turma', 'id_professor'], 'required'],
            [['assinado'], 'number'],
            [['data_hora', 'id_disciplina_turma', 'id_aluno', 'id_professor'], 'integer'],
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

    public function getEncondedTopico()
    {
        return Html::encode($this->topico);
    }

    public function getEncondedDescricao()
    {
        return Html::encode($this->descricao);
    }

    public static function getValidRecados(){

        $queryAllMyAlunos = Aluno::find()
            ->andWhere(['id_encarregado_de_educacao' => Yii::$app->user->id])->all();

        for ($i = 0; $i < count($queryAllMyAlunos); $i++) {
            $IDTurmaAllMyAlunos[$i] = $queryAllMyAlunos[$i]->id_turma;
            $IDAllMyAlunos[$i] = $queryAllMyAlunos[$i]->id;
        }

        $queryAllDisciplinaTurmas = Disciplinaturma::find()
            ->andWhere(['id_turma' => $IDTurmaAllMyAlunos])->all();

        for ($i = 0; $i < count($queryAllDisciplinaTurmas); $i++) {
            $IDDisciplinaTurmas[$i] = $queryAllDisciplinaTurmas[$i]->id;
        }

        $validRecados = RecadoGuardian::find()
            ->orderBy(['data_hora' => SORT_DESC, 'assinado' => SORT_ASC])
            ->andWhere(['id_disciplina_turma' => $IDDisciplinaTurmas])->andWhere(['id_aluno' => null])->orWhere(['id_aluno' => $IDAllMyAlunos]);

        return $validRecados;
    }
}
