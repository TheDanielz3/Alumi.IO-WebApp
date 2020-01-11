<?php namespace frontend\tests;



use app\models\Turma;

class TurmaTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testAssertingTrue()
    {
        $turma = new Turma();
        $turma->ano = 1;
        $turma->letra = "P";

        $this->assertTrue($turma->validate());
    }
    public function testAssertingFalse()
    {
        $turma = new Turma();
        $turma->ano = null;
        $turma->letra = null;

        $this->assertFalse($turma->validate());
    }

}