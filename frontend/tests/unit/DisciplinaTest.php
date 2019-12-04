<?php namespace frontend\tests;

use Codeception\Lib\Di;
use Codeception\Test\Unit;
use frontend\models\Disciplina;

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
        $disciplina->Nome = 'Plataformas de Sistemas e Informacao';
        $this->assertTrue($disciplina->validate(['Nome']));
    }
    public function testRegisterWhithBadParaments()
    {
        $disciplina = new Disciplina();
        $disciplina->Nome = null;
        $this->assertFalse($disciplina->validate(['Nome']));
    }

    public function testRegisterOnDatabase()
    {
        $this->tester->comment('Creating Atributs');
        $disciplina = new Disciplina();
        $disciplina->Nome = 'Plataformas de Sistemas e Informacao';

        $this->tester->comment('Saving Atributes');
        $disciplina->safeAttributes();
        $disciplina->save();

        $this->tester->comment('Checking atributes');
        $this->assertEquals('Plataformas de Sistemas e Informacao', $disciplina->Nome);


        $this->tester->comment('Checking record');
        $this->tester->seeRecord('frontend\models\Disciplina', [
            'Nome' => 'Plataformas de Sistemas e Informacao'
        ]);

    }
}