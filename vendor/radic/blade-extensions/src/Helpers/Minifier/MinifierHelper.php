<?php
/**
 * Copyright (c) 2017. Robin Radic.
 *
 * The license can be found in the package and online at https://radic.mit-license.org.
 *
 * @copyright 2017 Robin Radic
 * @license   https://radic.mit-license.org MIT License
 *
 * @version   7.0.0
 */

namespace Radic\BladeExtensions\Helpers\Minifier;

/**
 * This is the Minifier.
 *
 * @author         Caffeinated Dev Team
 * @copyright      Copyright (c) 2015, Caffeinated
 * @license        https://tldrlegal.com/license/mit-license MIT License
 */
class MinifierHelper
{
    /**
     * @var
     */
    protected $type;

    /**
     * open.
     *
     * @param $type
     */
    public function open($type)
    {
        $this->type = trim(strtolower($type));
        ob_start();
    }

    /**
     * close.
     */
    public function close()
    {
        $code = ob_get_clean();
        $code = $this->minify($this->type, $code);
        echo $code;
        $this->type = null;
    }

    /**
     * minify.
     *
     * @param $type
     * @param $code
     *
     * @return string
     */
    public function minify($type, $code)
    {
        $types = [ 'html', 'css', 'js' ];

        if ( ! \in_array($type, $types, true)) {
            $typeStr = implode(', ', $types);
            throw new \InvalidArgumentException("BladeExtensions Minifier could not minify your code, you haven't specified a valid type. Given: [{$type}]. Allowed: [{$typeStr}]");
        }

        if ($type === 'html') {
            if (class_exists('zz\Html\HTMLMinify')) {
                return \zz\Html\HTMLMinify::minify($code, [
                    'optimizationLevel' => \zz\Html\HTMLMinify::OPTIMIZATION_ADVANCED,
                    'doctype' => \zz\Html\HTMLMinify::DOCTYPE_HTML5
                ]);
            }
            return $this->compileMinify($code, true);
        }

        if ($type === 'css' && class_exists('MatthiasMullie\Minify\CSS')) {
            return with(new \MatthiasMullie\Minify\CSS($code))->execute();
        }

        if ($type === 'js' && class_exists('MatthiasMullie\Minify\JS')) {
            return with(new \MatthiasMullie\Minify\JS($code))->execute();
        }

        return $code;
    }

    /**
     * @author https://github.com/yocmen/html-minify
     *
     * @param string $value the contents of the view file
     *
     * @return bool
     */
    protected function shouldMinify($value)
    {
        return ! (false !== strpos($value, "skipmin")
            || preg_match('/<(pre|textarea)/', $value)
            || preg_match('/<script[^\??>]*>[^<\/script>]/', $value)
            || preg_match('/value=("|\')(.*)([ ]{2,})(.*)("|\')/', $value));
    }

    /**
     * Compress the HTML output before saving it.
     *
     * @author https://github.com/yocmen/html-minify
     *
     * @param string $value the contents of the view file
     *
     * @return string
     */
    protected function compileMinify($value, $force = false)
    {
        if ($this->shouldMinify($value) || $force) {
            $replace = [
                '/<!--[^\[](.*?)[^\]]-->/s' => '',
                '/<\?php/'                  => '<?php ',
                '/\n([\S])/'                => ' $1',
                '/\r/'                      => '',
                '/\n/'                      => '',
                '/\t/'                      => ' ',
                '/ +/'                      => ' ',
                '/>\s</'                    => '><',
            ];

            return preg_replace(
                array_keys($replace),
                array_values($replace),
                $value
            );
        } else {
            return $value;
        }
    }
}
