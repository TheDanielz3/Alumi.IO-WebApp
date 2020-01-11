<?php namespace frontend\tests;

use app\models\Aluno;
use app\models\Turma;
use Codeception\Test\Unit;
use common\fixtures\ProfessorFixture;
use common\fixtures\UserFixture;

class AlunoTest extends Unit
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

        $turma = New Turma();
        $turma->id = 1;
        $turma->ano = 1;
        $turma->letra = "A";
        $turma->save();

    }

    protected function _after()
    {
        Turma::deleteAll(['id' => 1]);
    }

    // tests
    public function testCreatingAlunoValidValues()
    {
        $aluno = new Aluno();
        $aluno->id = 4000;
        $aluno->nome = "nome";
        $aluno->id_turma = 1;

        $this->assertTrue($aluno->validate(), 'Tem os valores todos corretos');
    }

    public function testCreatingAlunoInvalidValues()
    {
        $aluno = new Aluno();
        $aluno->id = null;
        $this->assertFalse($aluno->validate(['id']),'Id não pode ser nulo');
        $aluno->id = "asdasdasd";
        $this->assertFalse($aluno->validate(['id']),'Id tem de ser um inteiro');
        $aluno->nome = "nome";
        $aluno->id_turma = "null";
        $this->assertFalse($aluno->validate(['id_turma']),'id_turma tem de ser um inteiro');

        $this->assertFalse($aluno->validate());
    }
}