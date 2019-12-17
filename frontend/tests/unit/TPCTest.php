<?php namespace frontend\tests;

use Codeception\Test\Unit;
use frontend\models\Disciplina;
use frontend\models\DisciplinaTurma;
use frontend\models\Tpc;
use frontend\models\Turma;

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
//        $turma = new Turma();
//        $turma->ano = 1;
//        $turma->letra = 'a';
//        $turma->save();
//
//        $disciplina = new Disciplina();
//        $disciplina->nome = 'matematica';
//        $disciplina->save();
//
//        $before =  new DisciplinaTurma();
//        $before->id_disciplina = 1;
//        $before->id_turma = 1;
//        $before->save();

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