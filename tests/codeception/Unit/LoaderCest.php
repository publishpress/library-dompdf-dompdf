<?php

class LoaderCest
{
    public function loadsPrefixedDompdf(UnitTester $I)
    {
        require_once dirname(__DIR__, 3) . '/lib/include.php';

        $I->assertTrue(class_exists('PublishPress\\Dompdf\\Dompdf'));
        $I->assertTrue(class_exists('PublishPress\\FontLib\\Font'));
        $I->assertTrue(class_exists('PublishPress\\Svg\\Document'));
        $I->assertTrue(class_exists('PublishPress\\Masterminds\\HTML5'));
        $I->assertTrue(class_exists('PublishPress\\Sabberworm\\CSS\\Parser'));
        $I->assertFalse(class_exists('Dompdf\\Dompdf', false));
        $I->assertFalse(class_exists('FontLib\\Font', false));
        $I->assertFalse(class_exists('Svg\\Document', false));
        $I->assertFalse(class_exists('Masterminds\\HTML5', false));
        $I->assertFalse(class_exists('Sabberworm\\CSS\\Parser', false));
    }
}
