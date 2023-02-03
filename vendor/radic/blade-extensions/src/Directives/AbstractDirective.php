<?php
/**
 * Copyright (c) 2017. Robin Radic.
 *
 * The license can be found in the package and online at https://radic.mit-license.org.
 *
 * @copyright 2017 Robin Radic
 * @license https://radic.mit-license.org MIT License
 *
 * @version 7.0.0 Radic\BladeExtensions
 */

namespace Radic\BladeExtensions\Directives;

use Radic\BladeExtensions\Exceptions\PregReplaceException;
use Radic\BladeExtensions\Helpers\Util;

/**
 * This is the class Directive.
 *
 * @author  Robin Radic
 */
abstract class AbstractDirective implements DirectiveInterface
{
    const PLAIN_MATCHER = '/(?<!\w)(\s*)@NAME(\s*)/';
    const OPEN_MATCHER = '/(?<!\w)(\s*)@NAME(\s*\(.*\))/';

    /** @var string */
    protected $pattern = self::PLAIN_MATCHER;

    /** @var string The string to use for replacement */
    protected $replace;

    /** @var string The name to use */
    protected $name;

    /** @var string */
    public static $compatibility = '5.*';

    /**
     * isCompatible method.
     *
     * @return bool
     */
    public static function isCompatible()
    {
        return Util::isCompatibleVersionConstraint(static::$compatibility);
    }

    /**
     * getProcessedPattern method.
     *
     * @return mixed
     */
    protected function getProcessedPattern()
    {
        return str_replace('NAME', $this->getName(), $this->getPattern());
    }

    /**
     * handle method.
     *
     * @param $value
     *
     * @return mixed
     */
    public function handle($value)
    {
        $replacement = preg_replace($this->getProcessedPattern(), $this->getReplace(), $value);
        // PHP 7.3 adds a new PCRE constant, PCRE_JIT_SUPPORT that is a boolean, and that causes the array_flip
        // to throw an error, so we need to remove that from the array first.
        $pcreConstants = get_defined_constants(true)['pcre'];
        unset($pcreConstants['PCRE_JIT_SUPPORT']);
        $error = array_flip($pcreConstants)[preg_last_error()];
        if ($error !== 'PREG_NO_ERROR') {
            throw PregReplaceException::error($error, get_called_class());
        }

        return $replacement;
    }

    /**
     * getPattern method.
     *
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * setPattern method.
     *
     * @param string $pattern
     *
     * @return $this
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * getReplace method.
     *
     * @return string
     */
    public function getReplace()
    {
        return $this->replace;
    }

    /**
     * setReplace method.
     *
     * @param string $replace
     *
     * @return $this
     */
    public function setReplace($replace)
    {
        $this->replace = $replace;

        return $this;
    }

    /**
     * getName method.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * setName method.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
