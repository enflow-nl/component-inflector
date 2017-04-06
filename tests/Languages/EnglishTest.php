<?php

namespace Enflow\Component\Inflector\Test\Inflections;

use Enflow\Component\Inflector\Inflector;
use Enflow\Component\Inflector\Test\AbstractInflectionTest;

class EnglishTest extends AbstractInflectionTest
{
    public function setUp()
    {
        $this->inflector = Inflector::forLanguageCode('en');
    }

    public static function words(): array
    {
        return [
            ['access', 'accesses'],
            ['baby', 'babies'],
            ['hat', 'hats'],
            ['mouse', 'mice'],
            ['news', 'news'],
            ['wife', 'wives'],
        ];
    }
}
