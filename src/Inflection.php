<?php

namespace Enflow\Component\Inflector;

abstract class Inflection
{
    /**
     * @return array
     */
    abstract public function singular(): array;

    /**
     * @return array
     */
    abstract public function plural(): array;

    /**
     * @return array
     */
    abstract public function uninflected(): array;

    /**
     * @return array
     */
    abstract public function irregular(): array;
}
