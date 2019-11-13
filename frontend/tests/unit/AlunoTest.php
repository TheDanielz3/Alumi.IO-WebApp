<?php namespace frontend\tests;

use Codeception\Test\Unit;
use common\models\User;
use frontend\models\Aluno;

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
    public function CreatingAlunoValidStuff()
    {

        $aluno = new Aluno();

       // $aluno->
       // $this->
    }
}