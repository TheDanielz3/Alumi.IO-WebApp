<?php namespace frontend\tests;

use Codeception\Test\Unit;
use frontend\models\Tpc;

class TpcTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testAssetinTrueArguments()
    {
        $tpc = new Tpc();

        $tpc->Descrição = "ola eu sou a descricao de tpc";
        $tpc->ID_Disciplina_Turmas = 1;


        $this->assertTrue($tpc->validate(['Descrição']));
        $this->assertTrue($tpc->validate(['ID_Disciplina_Turmas']));
    }

    public function testAssetinFalseArguments()
    {
        $tpc = new Tpc();

        $tpc->Descrição = null;
        $tpc->ID_Disciplina_Turmas = null;


        $this->assertFalse($tpc->validate(['Descrição']));
        $this->assertFalse($tpc->validate(['ID_Disciplina_Turmas']));
    }

    // tests

    public function testIssertingOnDatabase()
    {
        $tpc = new Tpc();

        $tpc->Descrição = "Ola eu sou uma Descricao";
        $tpc->ID_Disciplina_Turmas = 1;


        $tpc->safeAttributes();
        $tpc->save();

        $this->tester->seeRecord('frontend\models\Tpc', [
            'Descrição' => 'Ola eu sou uma Descricao',
            'ID_Disciplina_Turmas' => 1
        ]);

    }

    protected function _before()
    {
    }

    //Fixme: Criar primeiro do DisciplinaTurma

    protected function _after()
    {
    }
}