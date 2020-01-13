<?php namespace frontend\tests\acceptance;

use common\fixtures\UserFixture;
use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class MyNewScenarioCest
{
    protected $signupFormId = '#form-signup';

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
                'SignupForm[user_type]' => 'student',
            ]
        );

        $I->waitForText('If you forgot your password you can reset it.');

        $I->seeRecord('common\models\User', [
            'username' => 'acceptanceTestingUsername',
            'status' => \common\models\User::STATUS_INACTIVE
        ]);

    }

}
