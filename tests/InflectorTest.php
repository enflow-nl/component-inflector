<?php

namespace Enflow\Component\Inflector\Test;

use Enflow\Component\Inflector\Inflector;
use Enflow\Component\Inflector\Language\Dutch;

final class InflectorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Inflector
     */
    private $inflector;

    public function setUp()
    {
        $this->inflector = Inflector::forLanguageCode('en');
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

    public function test_that_throws_exception_for_unknown_language_code()
    {
        $this->expectException(\InvalidArgumentException::class);

        Inflector::forLanguageCode('zz');
    }

    public function test_that_for_language_method_works()
    {
        Inflector::forLanguage(new Dutch());
    }
}
