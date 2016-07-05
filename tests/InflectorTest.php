<?php

namespace Enflow\Component\Inflector\Test;

use Enflow\Component\Inflector\Inflector;

final class InflectorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Inflector
     */
    private $inflector;

    public function setUp()
    {
        $this->inflector = new Inflector();
    }

    public function test_pluralize()
    {
        $this->assertEquals($this->inflector->pluralize('apple'), 'apples');
    }

    public function test_singularize()
    {
        $this->assertEquals($this->inflector->singularize('apples'), 'apple');
    }

    public function test_that_pluralize_keeps_uppercase()
    {
        $this->assertEquals($this->inflector->pluralize('Apple'), 'Apples');
    }

    public function test_that_singularize_keeps_uppercase()
    {
        $this->assertEquals($this->inflector->singularize('Apples'), 'Apple');
    }
}
