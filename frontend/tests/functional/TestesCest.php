<?php namespace frontend\tests\functional;
use app\models\Professor;
use app\models\Turma;
use common\fixtures\AuthAssignmentFixture;
use common\fixtures\ProfessorFixture;
use common\fixtures\UserFixture;
use frontend\tests\FunctionalTester;
use Yii;

class TestesCest
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
        $I->amOnRoute('teste-teacher/index');
    }

    public function accessTesteTeachersIndexWithPermissions(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
                'LoginForm[username]'  => 'erau',
                'LoginForm[password]'  => 'password_0',
            ]
        );

        $I->amOnPage('site/dashboard');
        $I->see('Logout (erau)');

        $I->amOnRoute('teste-teacher/index');
        $I->see('Teste');
        $I->see('Create Teste');
        $I->see('No results found.');
    }

    public function accessTesteGuadiansIndexWithPermissions(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
                'LoginForm[username]'  => 'erau',
                'LoginForm[password]'  => 'password_0',
            ]
        );

        $I->amOnPage('site/dashboard');
        $I->see('Logout (erau)');

        $I->amOnRoute('teste-guardian/index');
        $I->see('Forbidden (#403)');
    }

    public function accessTesteStudentIndexWithPermissions(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
                'LoginForm[username]'  => 'erau',
                'LoginForm[password]'  => 'password_0',
            ]
        );

        $I->amOnPage('site/dashboard');
        $I->see('Logout (erau)');

        $I->amOnRoute('teste-student/index');
        $I->see('Forbidden (#403)');
    }
}
