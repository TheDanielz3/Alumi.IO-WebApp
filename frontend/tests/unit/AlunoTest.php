<?php namespace frontend\tests;

use app\models\Aluno;
use Codeception\Test\Unit;

class AlunoTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        //Create user for testing

    }

    protected function _after()
    {
    }

    // tests
    public function testCreatingAlunoValidStuff()
    {

        //Todo: Do the aluno
        $aluno = new Aluno();

    }
}