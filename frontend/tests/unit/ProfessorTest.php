<?php namespace frontend\tests;

use app\models\Professor;
use common\fixtures\ProfessorFixture;
use common\fixtures\UserFixture;

class ProfessorTest extends \Codeception\Test\Unit
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
        ]);
    }

    protected function _after()
    {
    }

    public function testAssertTrue()
    {
        $professor = new Professor();
        $professor->id = 4000;
        $professor->nome = "nome";

        $this->assertTrue($professor->validate());
    }

    public function testAssertFalse()
    {
        $professor = new Professor();
        $professor->id = "null";
        $professor->nome = "nome";

        $this->assertFalse($professor->validate());
    }
}