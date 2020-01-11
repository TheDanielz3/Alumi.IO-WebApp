<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnPage('site/index');
        $I->see('Alumio!');
        $I->seeLink('About');
        $I->click('About');
        $I->see('Alumio is a project created by:');
    }
}