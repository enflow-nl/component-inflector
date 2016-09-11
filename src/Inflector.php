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

class Inflector
{
    /**
     * @var Language
     */
    private $language;

    /**
     * @var array
     */
    private static $languages = [
        'en' => Language\English::class,
        'nl' => Language\Dutch::class,
    ];

    /**
     * @param Language $language
     */
    private function __construct(Language $language)
    {
        $this->language = $language;
    }

    /**
     * Return $word in plural form.
     *
     * @param string $word Word in singular
     * @return string Word in plural
     */
    public function pluralize(string $word): string
    {
        $pluralize = '(?:' . implode('|', array_keys($this->language->irregular())) . ')';

        if (preg_match('/(.*?(?:\\b|_))(' . $pluralize . ')$/i', $word, $regs)) {
            return $regs[1] . substr($regs[2], 0, 1) . substr($this->language->irregular()[strtolower($regs[2])], 1);
        }

        if (preg_match($this->getUninflectedRegex(), $word, $regs)) {
            return $word;
        }

        foreach ($this->language->plural() as $rule => $replacement) {
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
        $singular = '(?:' . implode('|', $this->language->irregular()) . ')';

        if (preg_match('/(.*?(?:\\b|_))(' . $singular . ')$/i', $word, $regs)) {
            return $regs[1] . substr($regs[2], 0, 1) . substr(array_search(strtolower($regs[2]), $this->language->irregular()), 1);
        }

        if (preg_match($this->getUninflectedRegex(), $word, $regs)) {
            return $word;
        }

        foreach ($this->language->singular() as $rule => $replacement) {
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
        return '/^((?:' . implode('|', $this->language->uninflected()) . '))$/i';
    }

    /**
     * @param Language $language
     * @return static
     */
    public static function forLanguage(Language $language): self
    {
        return new static($language);
    }

    /**
     * @param string $languageCode ISO-639-1 language code
     * @return static
     */
    public static function forLanguageCode(string $languageCode): self
    {
        if (!array_key_exists($languageCode, static::$languages)) {
            throw new \InvalidArgumentException("Language code '{$languageCode}' does not have a registered language to use in inflections.");
        }

        return static::forLanguage(new static::$languages[$languageCode]);
    }
}
