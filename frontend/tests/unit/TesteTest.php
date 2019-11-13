<?php namespace frontend\tests;

use Codeception\Test\Unit;
use frontend\models\Teste;

class TesteTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testValidationTrueOnAsserts()
    {
        $this->tester->comment('Criating true Data');
        $teste = new Teste();
        $teste->Descrição = "eu sou uma Descriçao";
        $teste->Data = "12/10/2019";
        $teste->hora = "12:10";
        $teste->ID_Disciplina_Turmas = 1;

        $this->assertTrue($teste->validate(['Descrição']));
        $this->assertTrue($teste->validate(['Data']));
        $this->assertTrue($teste->validate(['hora']));
        //Fixme: Resolver o assert da linha 34
        $this->assertTrue($teste->validate(['ID_Disciplina_Turmas']));
    }

    protected function _before()
    {
    }

    // tests

    protected function _after()
    {
    }
}