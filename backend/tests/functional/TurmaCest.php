<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\AuthAssignmentFixture;
use common\fixtures\UserFixture;
use Yii;

/**
 * Class LoginCest
 */
class TurmaCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @return array
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @see \Codeception\Module\Yii2::_before()
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ],
            'auth_assignment' => [
                'class' => AuthAssignmentFixture::className(),
                'dataFile' => codecept_data_dir() . 'auth_assignment.php'
            ],
        ];
    }

    /**
     * @param FunctionalTester $I
     */
    public function disciplinaAdd(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'erau');
        $I->fillField('Password', 'password_0');
        $I->click('login-button');

        $I->see('Logout (erau)', 'form button[type=submit]');
        $I->see('Access Tables:', 'h2');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');
        $I->click('Turmas');
        $I->see('Turmas');
        $I->see('Create Turma');

        $I->click('Create Turma');

        $I->fillField('Turma[ano]', '80');
        $I->fillField('Turma[letra]', 'Z');
        $I->click('Save');
        $I->see('80');
        $I->see('Z');
        $I->see('Delete');
        $I->click('Delete');
        $I->see('Create Turma');

    }
}
