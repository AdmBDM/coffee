<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use Yii;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnPage(Yii::$app->homeUrl);
        $I->see(Yii::$app->params['app_title']);
        $I->seeLink('About');
        $I->click('About');
        $I->see('This is the About page.');
    }
}