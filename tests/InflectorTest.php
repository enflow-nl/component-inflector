<?php

namespace Enflow\Component\Inflector\Test;

use Enflow\Component\Inflector\Inflector;
use Enflow\Component\Inflector\Language\Dutch;
use PHPUnit\Framework\TestCase;

class InflectorTest extends TestCase
{
    /**
     * @var \Enflow\Component\Inflector\Inflector
     */
    private $inflector;

    public function setUp(): void
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
        $this->assertInstanceOf(Inflector::class, Inflector::forLanguage(new Dutch()));
    }
}
