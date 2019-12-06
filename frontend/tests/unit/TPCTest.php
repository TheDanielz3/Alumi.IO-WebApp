<?php namespace frontend\tests;

use Codeception\Test\Unit;
use frontend\models\Tpc;

class TPCTest extends Unit
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
        $tpc = new Tpc();
        $tpc->descricao = "Eu sou uma descricao";
        $tpc->id_disciplina_turma = 1;

        $this->assertTrue($tpc->validate(['descricao']));
        $this->assertTrue($tpc->validate(['id_disciplina_turma']));

    }

    //Todo: Ver migracao porque ta null no id
    public function testAssertingFalse()
    {
        $tpc = new Tpc();
        $tpc->descricao = null;
        $tpc->id_disciplina_turma = "null";

        $this->assertFalse($tpc->validate(['descricao']));
        $this->assertFalse($tpc->validate(['id_disciplina_turma']));
    }
}