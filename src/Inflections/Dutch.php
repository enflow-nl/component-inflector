<?php

namespace Enflow\Component\Inflector\Inflections;

use Enflow\Component\Inflector\Inflection;

class Dutch extends Inflection
{
    /**
     * http://nl.wikipedia.org/wiki/Klinker_%28klank%29
     *
     * @var string
     */
    private $klinker = '(a|e|i|o|u|ij)';

    /**
     * http://nl.wikipedia.org/wiki/Klinker_%28klank%29
     *
     * @var string
     */
    private $korteKlinker = '(u|i|e|a|o)';

    /**
     * @return array
     */
    public function singular(): array
    {
        return [
            // http://nl.wikipedia.org/wiki/Meervoud_(Nederlands)#Beroepen_eindigend_op_-man
            '/()mannen$/i'                                      => '\1man',
            // http://nl.wikipedia.org/wiki/Meervoud_(Nederlands)#Latijnse_meervoudsvormen
            '/()ices$/i'                                        => '\1ex',
            // http://nl.wikipedia.org/wiki/Meervoud_%28Nederlands%29#Stapelmeervoud
            '/^(ei|gemoed|goed|hoen|kind|lied|rad|rund)eren$/i' => '\1',
            // http://nl.wikipedia.org/wiki/Nederlandse_grammatica
            '/()ijen$/i'                                        => '\1ij',
            '/()ieen$/i'                                        => '\1ie',    //ën
            '/()(' . $this->klinker . ')s$/i'                   => '\1\2',
            '/()(' . $this->getMedeklinker() . ')s$/i'          => '\1\2',
            '/()(' . $this->getMedeklinker() . ')en$/i'         => '\1\2',
        ];
    }

    /**
     * @return array
     */
    public function plural(): array
    {
        return [
            // allready in plural
            '/()ijen$/i'                                                              => '\1ijen',
            '/()ieën$/i'                                                              => '\1ieën',
            '/()(' . $this->klinker . ')s$/i'                                         => '\1\2s',
            '/()' . $this->getMedeklinker() . 'en$/i'                                 => '\1\2en',
            // http://nl.wikipedia.org/wiki/Meervoud_%28Nederlands%29#Klinkerverandering
            '/()heid$/i'                                                              => '\1heden',
            // http://nl.wikipedia.org/wiki/Meervoud_(Nederlands)#Beroepen_eindigend_op_-man
            '/()man$/i'                                                               => '\1mannen',
            // http://nl.wikipedia.org/wiki/Meervoud_(Nederlands)#Latijnse_meervoudsvormen
            '/()ix$/i'                                                                => '\1ices',
            '/()ex$/i'                                                                => '\1ices',
            // http://nl.wikipedia.org/wiki/Meervoud_%28Nederlands%29#Stapelmeervoud
            '/^(ei|gemoed|goed|hoen|kind|lied|rad|rund)$/i'                           => '\1eren',
            // http://nl.wikipedia.org/wiki/Nederlandse_grammatica
            '/()ij$/i'                                                                => '\1ijen',
            '/()orie$/i'                                                              => '\1orieen',    //ën klemtoon
            '/()io$/i'                                                                => '\1io\'s',
            '/()' . $this->klinker . '$/i'                                            => '\1\2s',
            '/()(' . $this->getMedeklinker() . 'e' . $this->getMedeklinker() . ')$/i' => '\1\2s',
            '/()(' . $this->getMedeklinker() . $this->korteKlinker . 's)$/i'          => '\1\2sen',
            '/()(' . $this->getMedeklinker() . 's)$/i'                                => '\1\2en',
            '/()s$/i'                                                                 => '\1zen',
            '/()' . $this->getMedeklinker() . '$/i'                                   => '\1\2en',
        ];
    }

    /**
     * @return array
     */
    public function uninflected(): array
    {
        return [
            // http://nl.wikipedia.org/wiki/Singulare_tantum
            'letterkunde',
            'muziek',
            'heelal',
            'vastgoed',
            'have',
            'nageslacht',
            // http://nl.wikipedia.org/wiki/Plurale_tantum
            'feedback',
            'hersenen',
            'ingewanden',
            'mazelen',
            'pokken',
            'waterpokken',
            'financiën',
            'activa',
            'passiva',
            'onkosten',
            'kosten',
            'bescheiden',
            'paperassen',
            'notulen',
            'Roma',
            'Sinti',
            'Inuit',
            'taliban',
            'illuminati',
            'aanstalten',
            'hurken',
            'lurven',
            'luren',
        ];
    }

    /**
     * @return array
     */
    public function irregular(): array
    {
        return [
            // http://nl.wikipedia.org/wiki/Klemtoon
            'olie'             => 'oliën',
            'industrie'        => 'industrieën',
            // http://nl.wikipedia.org/wiki/Meervoud_%28Nederlands%29#Klinkerverandering
            'lid'              => 'leden',
            'smid'             => 'smeden',
            'schip'            => 'schepen',
            'stad'             => 'steden',
            // http://nl.wikipedia.org/wiki/Meervoud_%28Nederlands%29#Stapelmeervoud
            'gelid'            => 'gelederen',
            'kalf'             => 'kalveren',
            'lam'              => 'lammeren',
            // http://nl.wikipedia.org/wiki/Meervoud_%28Nederlands%29#Onregelmatige_meervoudsvorming
            'koe'              => 'koeien',
            'vlo'              => 'vlooien',
            'leerrede'         => 'leerredenen',
            'lende'            => 'lendenen',
            'epos'             => 'epen',
            'genius'           => 'geniën',
            'aanbod'           => 'aanbiedingen',
            'beleg'            => 'belegeringen',
            'dank'             => 'dankbetuigingen',
            'gedrag'           => 'gedragingen',
            'genot'            => 'genietingen',
            'lof'              => 'lofbetuigingen',
            'schema_migration' => 'schema_migrations',
            // http://nl.wikipedia.org/wiki/Meervoud_(Nederlands)#Latijnse_meervoudsvormen
            'qaestrices'       => 'quaestrix',
            'matrices'         => 'matrix',
            'categorie'        => 'categorieën',
        ];
    }

    /**
     * @return string
     */
    private function getMedeklinker(): string
    {
        // http://nl.wikipedia.org/wiki/Medeklinker
        $plofKlank       = '(p|t|k|b|d)';
        $wrijfKlank      = '(f|s|ch|sj|v|z|g|j)'; // journaal
        $neusKlank       = '(m|n|ng)';
        $vloeiKlank      = '(l|r)';
        $glijKlank       = '(j|w)'; // jaar
        $affricate       = '(ts|zz|tsj|g)'; // /d3/ gin
        $missingFromWiki = '(c|h|p|q|x|y|z)';
        return '(' . $missingFromWiki . '|' . $plofKlank . '|' . $wrijfKlank . '|' . $neusKlank . '|' . $vloeiKlank . '|' . $glijKlank . '|' . $affricate . ')';
    }
}
