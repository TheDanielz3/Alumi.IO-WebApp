<?php namespace frontend\tests;

use app\models\Disciplina;
use app\models\Disciplinaturma;
use app\models\Professor;
use app\models\TpcTeacher;
use app\models\Turma;
use Codeception\Test\Unit;
use common\fixtures\ProfessorFixture;
use common\fixtures\UserFixture;

class TPCTest extends Unit
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
        $tpc = new TpcTeacher();
        $tpc->descricao = "Eu sou uma descricao";
        $tpc->id_disciplina_turma = 1;
        $tpc->id_professor = 4000;

        $this->assertTrue($tpc->validate());
    }

    public function testAssertingFalse()
    {
        $tpc = new TpcTeacher();
        $tpc->descricao = null;
        $tpc->id_professor = "null";

        $this->assertFalse($tpc->validate());
    }
}