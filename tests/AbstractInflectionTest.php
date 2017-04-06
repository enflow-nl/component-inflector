<?php

namespace Enflow\Component\Inflector\Test;

use PHPUnit\Framework\TestCase;

abstract class AbstractInflectionTest extends TestCase
{
    /**
     * @var \Enflow\Component\Inflector\Inflector
     */
    protected $inflector;

    /**
     * @dataProvider words
     */
    public function test_pluralize(string $singularized, string $pluralized)
    {
        $this->assertEquals($this->inflector->pluralize($singularized), $pluralized);
    }

    /**
     * @dataProvider words
     */
    public function test_singularize(string $singularized, string $pluralized)
    {
        $this->assertEquals($this->inflector->singularize($pluralized), $singularized);
    }
}
