<?php

namespace Enflow\Component\Inflector\Test\Inflections;

use Enflow\Component\Inflector\Inflector;
use Enflow\Component\Inflector\Test\AbstractInflectionTest;

class DutchTest extends AbstractInflectionTest
{
    public function setUp()
    {
        $this->inflector = Inflector::forLanguageCode('nl');
    }

    public static function words(): array
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
            ['baby', 'babies'],
            ['geluid', 'geluiden'],
            ['vakantie', 'vakanties'],
            ['cursus', 'cursussen'],
        ];
    }
}
