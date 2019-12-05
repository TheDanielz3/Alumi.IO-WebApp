<?php namespace frontend\tests;

use Codeception\Test\Unit;
use frontend\models\Recado;

class RecadoTest extends Unit
{
    /**
     * @var UnitTester
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
        $recado = new Recado();
        $recado->descricao = "isto é um recado";
        // $recado->data =
    }

    public function testAssertingFalse()
    {
        $recado = new Recado();
        $recado->descricao = null;
        $recado->data = null;
        $recado->assinado = null;
        $recado->id_turma = "error";
        $recado->id_aluno = "error";


        $this->tester->comment("Testing Asserts False");

        $this->assertFalse($recado->validate(['descricao']));
        $this->assertFalse($recado->validate(['data']));
        $this->assertFalse($recado->validate(['assinado']));
        $this->assertFalse($recado->validate(['id_turma']));
        $this->assertFalse($recado->validate(['id_aluno']));

    }
}