<?php namespace frontend\tests;

use app\models\RecadoTeacher;
use Codeception\Test\Unit;

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
        $recado = new RecadoTeacher();
        $recado->topico = "This is the topic of a Recado";
        $recado->descricao = "This is the subject of a Recado";
        $recado->data_hora = 1571833332;
        $recado->id_professor = 1;
    }

    public function testAssertingFalse()
    {
        $recado = new RecadoTeacher();
        $recado->topico = null;
        $recado->descricao = null;
        $recado->data_hora = "null";
        $recado->assinado = null;
        $recado->id_turma = "error";
        $recado->id_aluno = "error";
        $recado->id_professor = "null";
    }
}