<?php namespace frontend\tests\functional;
use app\models\Professor;
use app\models\Turma;
use common\fixtures\AuthAssignmentFixture;
use common\fixtures\ProfessorFixture;
use common\fixtures\UserFixture;
use frontend\tests\FunctionalTester;
use Yii;

class UserLoginCest
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
        $I->amOnRoute('site/login');
    }

    public function loginWithEmptyFields(FunctionalTester $I)
    {
        $I->see('Login', 'h1');
        $I->see('Please fill out the following fields to login:');
        $I->submitForm($this->formId, []);
        $I->seeValidationError('Username cannot be blank.');
        $I->seeValidationError('Password cannot be blank.');
    }

    public function loginWithCorrectFields(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
                'LoginForm[username]'  => 'erau',
                'LoginForm[password]'  => 'password_0',
            ]
        );

        $I->amOnPage('site/dashboard');
        $I->see('Logout (erau)');
    }

}
