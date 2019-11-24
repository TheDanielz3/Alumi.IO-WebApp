<?php namespace frontend\tests;

use Codeception\Test\Unit;
use frontend\models\Teste;

class TesteTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    protected function _after()
    {


    }

    protected function _before()
    {


    }


    // tests
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
        $this->assertTrue($teste->validate(['ID_Disciplina_Turmas']));
    }

    public function testRegisterWhithBadParaments()
    {
        $teste = new Teste();
        $teste->Descrição = null;
        $teste->Data = null;
        $teste->hora = null;
        $teste->ID_Disciplina_Turmas = null;

        $this->assertFalse($teste->validate(['Descrição']));
        $this->assertFalse($teste->validate(['Data']));
        $this->assertFalse($teste->validate(['hora']));
        $this->assertFalse($teste->validate(['ID_Disciplina_Turmas']));
    }

    //Todo: testar base de dados
    public function testRegisterOnDatabase()
    {
        $this->tester->comment('Creating Atributs');
        $teste = new Teste();
        $teste->Descrição = "eu sou uma Descriçao";
        $teste->Data = "12/10/2019";
        $teste->hora = "12:10";
        $teste->ID_Disciplina_Turmas = 1;

        $this->tester->comment('Saving Atributes');
        $teste->safeAttributes();
        $teste->save();

        $this->tester->comment('Checking atributes');
        $this->assertEquals('eu sou uma Descriçao', $teste->Descrição);
        $this->assertEquals('12/10/2019', $teste->Data);
        $this->assertEquals('12:10', $teste->hora);
        $this->assertEquals('1', $teste->ID_Disciplina_Turmas);


        $this->tester->comment('Checking record');
        $this->tester->seeRecord('frontend\models\Teste', [
            'Descrição' => 'eu sou uma Descriçao',
            'Data' => '12/10/2019',
            'hora' => '12:10',
            'ID_Disciplina_Turmas' => '1'
        ]);
    }

}

