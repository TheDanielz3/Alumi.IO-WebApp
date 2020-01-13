<?php namespace frontend\tests\acceptance;

use common\fixtures\AuthAssignmentFixture;
use common\fixtures\ProfessorFixture;
use common\fixtures\UserFixture;
use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class MyNewScenarioCest
{
    protected $signupFormId = '#form-signup';
    protected $loginFormId = '#login-form';

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

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
    }


    public function tryToSignup(AcceptanceTester $I)
    {
        $I->click("Signup");
        $I->wait(1);

        $I->submitForm(
            $this->signupFormId, [
                'SignupForm[username]' => 'acceptanceTestingUsername',
                'SignupForm[nome]' => 'acceptanceTestingName',
                'SignupForm[email]' => 'account@account.account',
                'SignupForm[password]' => '123456',
                'SignupForm[user_type]' => 'teacher',
            ]
        );

        $I->waitForText('If you forgot your password you can reset it.');

        $I->seeRecord('common\models\User', [
            'username' => 'acceptanceTestingUsername',
            'status' => \common\models\User::STATUS_INACTIVE
        ]);

    }


    public function tryToLogin(AcceptanceTester $I)
    {
        $I->click("Login");
        $I->wait(1);

        $I->submitForm(
            $this->loginFormId, [
                'LoginForm[username]'  => 'acceptanceTestingUsername',
                'LoginForm[password]'  => '123456',
            ]
        );

        $I->amOnPage('site/dashboard');
    }

}
