<?php namespace frontend\tests\functional;
use app\models\Professor;
use app\models\Turma;
use common\fixtures\AuthAssignmentFixture;
use common\fixtures\ProfessorFixture;
use common\fixtures\UserFixture;
use frontend\tests\FunctionalTester;
use Yii;

class RecadosCest
{
    protected $formId = '#login-form';

    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php',
            ],
            'professor' => [
                'class' => ProfessorFixture::className(),
                'dataFile' => codecept_data_dir() . 'professor.php'
            ],
            'auth_assignment' => [
                'class' => AuthAssignmentFixture::className(),
                'dataFile' => codecept_data_dir() . 'auth_assignment.php'
            ],
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('recado-teacher/index');
    }

    public function accessRecadoTeachersIndexWithPermissions(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
                'LoginForm[username]'  => 'erau',
                'LoginForm[password]'  => 'password_0',
            ]
        );

        $I->amOnPage('site/dashboard');
        $I->see('Logout (erau)');

        $I->amOnRoute('recado-teacher/index');
        $I->see('Recados');
        $I->see('Create Recado');
        $I->see('No results found.');
    }

    public function accessRecadoGuadiansIndexWithoutPermissions(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
                'LoginForm[username]'  => 'erau',
                'LoginForm[password]'  => 'password_0',
            ]
        );

        $I->amOnPage('site/dashboard');
        $I->see('Logout (erau)');

        $I->amOnRoute('recado-guardian/index');
        $I->see('Forbidden (#403)');
    }
}
