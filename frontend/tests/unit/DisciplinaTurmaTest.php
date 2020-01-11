<?php namespace frontend\tests;

use app\models\Disciplina;
use app\models\Disciplinaturma;
use app\models\Turma;
use Codeception\Test\Unit;
use common\fixtures\ProfessorFixture;
use common\fixtures\UserFixture;

class DisciplinaTurmaTest extends Unit
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

    }

    protected function _after()
    {
        Disciplina::deleteAll(['id' => 1]);
        Turma::deleteAll(['id' => 1]);
    }

    public function testAssertingTrue()
    {
        $disciplinaTurma = new Disciplinaturma();
        $disciplinaTurma->id_professor = 4000;
        $disciplinaTurma->id_turma = 1;
        $disciplinaTurma->id_disciplina = 1;

        $this->assertTrue($disciplinaTurma->validate());

    }

    public function testAssertingFalse()
    {
        $disciplinaTurma = new Disciplinaturma();
        $disciplinaTurma->id_professor = "null";
        $disciplinaTurma->id_turma = "null";
        $disciplinaTurma->id_disciplina = "null";

        $this->assertFalse($disciplinaTurma->validate());

    }
}