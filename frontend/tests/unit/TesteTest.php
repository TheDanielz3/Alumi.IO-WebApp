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
        $teste->descricao = "eu sou uma Descricao";
        $teste->data = "2019-11-04";
        $teste->hora = "12:07:05";
        $teste->id_disciplina_turma = 1;

        $this->assertTrue($teste->validate(['Descrição']));
        $this->assertTrue($teste->validate(['Data']));
        $this->assertTrue($teste->validate(['hora']));
        $this->assertTrue($teste->validate(['ID_Disciplina_Turmas']));
    }

    public function testRegisterWhithBadParaments()
    {
        $teste = new Teste();
        $teste->descricao = null;
        $teste->data = null;
        $teste->hora = null;
        $teste->id_disciplina_turma = null;

        $this->assertFalse($teste->validate(['descricao']));
        $this->assertFalse($teste->validate(['data']));
        $this->assertFalse($teste->validate(['hora']));
        $this->assertFalse($teste->validate(['id_disciplina_turma']));
    }

    // tests

    public function testRegisterOnDatabase()
    {
        $this->tester->comment('Creating Atributs');
        $teste = new Teste();
        $teste->descricao = "eu sou uma Descricao";
        $teste->data = "2019-11-04";
        $teste->hora = "12:07:05";
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
            'data' => '2019-11-04',
            'hora' => '12:07:05',
            'id_disciplina_turma' => '1'
        ]);
    }

    protected function _after()
    {

    }

    protected function _before()
    {

    }

}

