<?php

namespace Enflow\Component\Inflector\Test\Inflections;

use Enflow\Component\Inflector\Inflections\English;
use Enflow\Component\Inflector\Inflector;
use Enflow\Component\Inflector\Test\AbstractInflectionTest;

final class EnglishTest extends AbstractInflectionTest
{
    public function setUp()
    {
        $this->inflector = new Inflector(new English());
    }

    /**
     * @return array
     */
    public static function testCases(): array
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
