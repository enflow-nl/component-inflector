<?php

namespace Enflow\Component\Inflector;

abstract class Language
{
    abstract public function singular(): array;

    abstract public function plural(): array;

    abstract public function uninflected(): array;

    abstract public function irregular(): array;
}
