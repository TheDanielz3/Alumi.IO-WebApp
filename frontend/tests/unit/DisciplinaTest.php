<?php namespace frontend\tests;

use app\models\Disciplina;
use Codeception\Test\Unit;

class DisciplinaTest extends Unit
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
    public function testRegistWhithGoodParaments()
    {
        $disciplina = new Disciplina();
        $disciplina->nome = 'Plataformas de Sistemas e Informacao';
        $this->assertTrue($disciplina->validate(['nome']));
    }
    public function testRegisterWhithBadParaments()
    {
        $disciplina = new Disciplina();
        $disciplina->nome = null;
        $this->assertFalse($disciplina->validate(['nome']));
    }

    public function testRegisterOnDatabase()
    {/*
        $this->tester->comment('Creating Atributs');
        $disciplina = new Disciplina();
        $disciplina->nome = 'Plataformas de Sistemas e Informacao';

        $this->tester->comment('Saving Atributes');
        $disciplina->safeAttributes();
        $disciplina->save();

        $this->tester->comment('Checking atributes');
        $this->assertEquals('Plataformas de Sistemas e Informacao', $disciplina->nome);


        $this->tester->comment('Checking record');
        $this->tester->seeRecord('frontend\models\Disciplina', [
            'nome' => 'Plataformas de Sistemas e Informacao'
        ]);*/

    }
}