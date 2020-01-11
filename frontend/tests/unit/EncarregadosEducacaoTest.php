<?php namespace frontend\tests;

use app\models\Encarregadoeducacao;
use common\fixtures\ProfessorFixture;
use common\fixtures\UserFixture;

class EncarregadosEducacaoTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ],
            'professor' => [
                'class' => ProfessorFixture::className(),
                'dataFile' => codecept_data_dir() . 'professor.php'
            ]
        ]);
    }

    protected function _after()
    {
    }

    public function testAssertingTrue()
    {
        $encarregado = new Encarregadoeducacao();
        $encarregado->id = 4000;
        $encarregado->nome = "nome Teste";

        $this->assertTrue($encarregado->validate());
    }

    public function testAssertingFalse()
    {
        $encarregado = new Encarregadoeducacao();
        $encarregado->id = "null";
        $encarregado->nome = "nome Teste";

        $this->assertFalse($encarregado->validate());
    }
}