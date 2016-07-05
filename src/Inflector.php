<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Enflow\Component\Inflector;

final class Inflector
{
    /**
     * @var Inflection
     */
    private $inflection;

    /**
     * @param Inflection|null $inflection
     */
    public function __construct(Inflection $inflection = null)
    {
        if ($inflection === null) {
            $inflection = new Inflections\English();
        }

        $this->inflection = $inflection;
    }

    /**
     * Return $word in plural form.
     *
     * @param string $word Word in singular
     * @return string Word in plural
     */
    public function pluralize(string $word): string
    {
        $pluralize = '(?:' . implode('|', array_keys($this->inflection->irregular())) . ')';

        if (preg_match('/(.*?(?:\\b|_))(' . $pluralize . ')$/i', $word, $regs)) {
            return $regs[1] . substr($regs[2], 0, 1) . substr($this->inflection->irregular()[strtolower($regs[2])], 1);
        }

        if (preg_match($this->getUninflectedRegex(), $word, $regs)) {
            return $word;
        }

        foreach ($this->inflection->plural() as $rule => $replacement) {
            if (preg_match($rule, $word)) {
                return preg_replace($rule, $replacement, $word);
            }
        }

        // Return original
        return $word;
    }

    /**
     * Return $word in singular form.
     *
     * @param string $word Word in plural
     * @return string Word in singular
     */
    public function singularize(string $word): string
    {
        $singular = '(?:' . implode('|', $this->inflection->irregular()) . ')';

        if (preg_match('/(.*?(?:\\b|_))(' . $singular . ')$/i', $word, $regs)) {
            return $regs[1] . substr($regs[2], 0, 1) . substr(array_search(strtolower($regs[2]),
                $this->inflection->irregular()), 1);
        }

        if (preg_match($this->getUninflectedRegex(), $word, $regs)) {
            return $word;
        }

        foreach ($this->inflection->singular() as $rule => $replacement) {
            if (preg_match($rule, $word)) {
                return preg_replace($rule, $replacement, $word);
            }
        }

        // Return original
        return $word;
    }

    /**
     * @return string
     */
    private function getUninflectedRegex(): string
    {
        return '/^((?:' . implode('|', $this->inflection->uninflected()) . '))$/i';
    }
}
