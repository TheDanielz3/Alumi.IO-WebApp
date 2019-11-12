<?php namespace frontend\tests;

use frontend\models\Pessoa;

class PessoaTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {


    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $pessoa = new Pessoa();
        $pessoa->idade = 70;
        $pessoa->nome = 'Samuel Daniel Rodrigo';
        $pessoa->email = "istoetestemuitogrande@testemuitogrande.pt";
        $pessoa->NIF = 123456789;
        $pessoa->morada = "Rua das bananas apartado: 22244455";


        //$this->assertTrue($pessoa->validate('nome'));
        //$this->assertTrue($pessoa->validate('idade'));
        //$this->assertTrue($pessoa->validate('NIF'));
       // $this->assertTrue($pessoa->validate('email'));
        //$this->assertTrue($pessoa->validate('morada'));



    }
}