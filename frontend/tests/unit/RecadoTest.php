<?php namespace frontend\tests;

use app\models\Disciplina;
use app\models\Disciplinaturma;
use app\models\RecadoTeacher;
use app\models\Turma;
use Codeception\Test\Unit;
use common\fixtures\ProfessorFixture;
use common\fixtures\UserFixture;

class RecadoTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    protected function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ],
            'professor' => [
                'class' => ProfessorFixture::className(),
                'dataFile' => codecept_data_dir() . 'professor.php'
            ]
        ]);

        $turma = new Turma();
        $turma->id = 1;
        $turma->ano = 1;
        $turma->letra = "A";
        $turma->save();

        $disciplina = new Disciplina();
        $disciplina->id = 1;
        $disciplina->nome = "teste";
        $disciplina->save();

        $disciplinaTurma = new Disciplinaturma();
        $disciplinaTurma->id = 1;
        $disciplinaTurma->id_disciplina = 1;
        $disciplinaTurma->id_turma = 1;
        $disciplinaTurma->id_professor = 4000;
        $disciplinaTurma->save();
    }

    protected function _after()
    {
        Disciplina::deleteAll(['id' => 1]);
        Turma::deleteAll(['id' => 1]);
        Disciplinaturma::deleteAll(['id' => 1]);
    }

    public function testAssertingTrue()
    {
        $recado = new RecadoTeacher();
        $recado->topico = "This is the topic of a Recado";
        $recado->descricao = "This is the subject of a Recado";
        $recado->assinado = 0;
        $recado->data_hora = 1571833332;
        $recado->id_disciplina_turma = 1;
        $recado->id_professor = 4000;

        $this->assertTrue($recado->validate());
    }

    public function testAssertingFalse()
    {
        $recado = new RecadoTeacher();
        $recado->topico = null;
        $recado->descricao = null;
        $recado->data_hora = "null";
        $recado->assinado = null;
        $recado->id_disciplina_turma = "error";
        $recado->id_aluno = "error";
        $recado->id_professor = "null";

        $this->assertFalse($recado->validate());
    }
}