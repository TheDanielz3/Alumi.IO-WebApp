<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\AuthAssignmentFixture;
use common\fixtures\UserFixture;
use Yii;

/**
 * Class LoginCest
 */
class DisciplinaCest
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
        $I->click('Disciplinas');
        $I->see('Disciplinas');
        $I->see('Create Disciplina');

        $I->click('Create Disciplina');

        $I->fillField('Disciplina[nome]', 'Disciplina Teste Functional');
        $I->click('Save');
        $I->see('Disciplina Teste Functional');
        $I->see('Delete');
        $I->click('Delete');
        $I->see('Create Disciplina');

    }
}
