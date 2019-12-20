<?php namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class MyNewScenarioCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('verify stuff');
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->wait(3);
        $I->see("Alumio");

    }
}
