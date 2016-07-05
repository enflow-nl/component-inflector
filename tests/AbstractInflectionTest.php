<?php

namespace Enflow\Component\Inflector\Test;

use Enflow\Component\Inflector\Inflector;

abstract class AbstractInflectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Inflector
     */
    protected $inflector;

    /**
     * @dataProvider testCases
     */
    public function test_pluralize(string $singularized, string $pluralized)
    {
        $this->assertEquals($this->inflector->pluralize($singularized), $pluralized);
    }

    /**
     * @dataProvider testCases
     */
    public function test_singularize(string $singularized, string $pluralized)
    {
        $this->assertEquals($this->inflector->singularize($pluralized), $singularized);
    }
}
