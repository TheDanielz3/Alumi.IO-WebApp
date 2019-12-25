<?php namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class MyNewScenarioCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->see("Alumi.IO");
        $I->click("Signup");
    }
}
