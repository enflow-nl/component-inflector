<?php

namespace Enflow\Component\Inflector\Test\Inflections;

use Enflow\Component\Inflector\Inflections\Dutch;
use Enflow\Component\Inflector\Inflector;
use Enflow\Component\Inflector\Test\AbstractInflectionTest;

final class DutchTest extends AbstractInflectionTest
{
    public function setUp()
    {
        $this->inflector = new Inflector(new Dutch());
    }

    /**
     * @return array
     */
    public static function testCases(): array
    {
        return [
            ['appel', 'appels'],
            ['agente', 'agentes'],
            ['boerderij', 'boerderijen'],
            ['stoel', 'stoelen'],
            ['tafel', 'tafels'],
            ['categorie', 'categorieën'],
            ['product', 'producten'],
            ['nieuwsbericht', 'nieuwsberichten'],
            ['agendapunt', 'agendapunten'],
        ];
    }
}
