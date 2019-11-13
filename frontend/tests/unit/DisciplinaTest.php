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
        $disciplina = new Disciplina();
        $disciplina->Nome = 'Plataformas de Sistemas e Informacao';
        $disciplina->safeAttributes();
        $disciplina->save();

        $this->assertEquals('Plataformas de Sistemas e Informacao', $disciplina->Nome);


        //FixMe: Resolver o problema do record
        $this->tester->seeRecord('frontend\models\Disciplina', [
            'Nome' => 'Plataformas de Sistemas e Informacao'
        ]);

    }
}