<?php namespace frontend\tests;

use app\models\Teste;
use Codeception\Test\Unit;

class TesteTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testValidationTrueOnAsserts()
    {
        $teste = new Teste();
        $teste->descricao = "eu sou uma Descricao";
        $teste->data_hora = 1571833332;
        $teste->id_disciplina_turma = 1;
        $teste->id_professor = 1;
    }

    public function testRegisterWhithBadParaments()
    {
        $teste = new Teste();
        $teste->descricao = null;
        $teste->data_hora = null;
        $teste->id_disciplina_turma = null;
        $teste->id_professor = null;

        $this->assertFalse($teste->validate(['descricao']));
        $this->assertFalse($teste->validate(['data_hora']));
        $this->assertFalse($teste->validate(['id_disciplina_turma']));
        $this->assertFalse($teste->validate(['id_professor']));
    }

    // tests

    public function testRegisterOnDatabase()
    {
        /*
        $this->tester->comment('Creating Atributs');
        $teste = new Teste();
        $teste->descricao = "eu sou uma Descricao";
        $teste->data_hora = 1571833332;
        $teste->id_disciplina_turma = 1;
        $this->tester->comment('Saving Atributes');
        $teste->safeAttributes();
        $teste->save();
        $this->tester->comment('Checking atributes');
        $this->assertEquals('eu sou uma Descricao', $teste->descricao);
        $this->assertEquals('2019-11-04', $teste->data);
        $this->assertEquals('12:07:05', $teste->hora);
        $this->assertEquals('1', $teste->id_disciplina_turma);
        $this->tester->comment('Checking record');
        $this->tester->seeRecord('frontend\models\Teste', [
            'descricao' => 'eu sou uma Descricao',
            'data_hora' => '1571833332',
            'id_disciplina_turma' => '1'
        ]);*/
    }

    protected function _after()
    {

    }

    protected function _before()
    {

    }

}

