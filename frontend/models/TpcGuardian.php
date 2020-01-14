<?php

namespace app\models;

use Yii;
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
class TpcGuardian extends \yii\db\ActiveRecord
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
            [['descricao', 'id_disciplina_turma', 'id_professor'], 'required'],
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

    public static function getValidTpc()
    {
        $IDTurmaAllMyAlunos[0] = -1;

        $queryAllMyAlunos = Aluno::find()
            ->andWhere(['id_encarregado_de_educacao' => Yii::$app->user->id])->all();

        for ($i = 0; $i < count($queryAllMyAlunos); $i++) {
            $IDTurmaAllMyAlunos[$i] = $queryAllMyAlunos[$i]->id_turma;
        }
        if ($IDTurmaAllMyAlunos[0] != -1) {

            $queryAllDisciplinaTurmas = Disciplinaturma::find()
                ->andWhere(['id_turma' => $IDTurmaAllMyAlunos])->all();

            for ($i = 0; $i < count($queryAllDisciplinaTurmas); $i++) {
                $IDDisciplinaTurmas[$i] = $queryAllDisciplinaTurmas[$i]->id;
            }

            $validTpc = TpcGuardian::find()
                ->orderBy(['id' => SORT_DESC])
                ->andWhere(['id_disciplina_turma' => $IDDisciplinaTurmas]);

        } elseif ($IDTurmaAllMyAlunos[0] == -1) {
            $validTpc = RecadoGuardian::find()->andWhere(['id' => null]);
        }
        return $validTpc;
    }
}
