<?php

namespace app\models;

use api\models\Teste;
use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "{{%teste}}".
 *
 * @property int $id
 * @property string $descricao
 * @property int $data_hora
 * @property int $id_disciplina_turma
 * @property int $id_professor
 *
 * @property Disciplinaturma $disciplinaTurma
 * @property Professor $professor
 */
class TesteGuardian extends \yii\db\ActiveRecord
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
            [['descricao', 'data_hora', 'id_disciplina_turma', 'id_professor'], 'required'],
            [['data_hora', 'id_disciplina_turma', 'id_professor'], 'integer'],
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
            'data_hora' => 'Data Hora',
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

    public static function getValidTestes(){

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

        $validRecados = TesteGuardian::find()
            ->orderBy(['data_hora' => SORT_DESC])
            ->andWhere(['id_disciplina_turma' => $IDDisciplinaTurmas]);

        return $validRecados;
    }
}
