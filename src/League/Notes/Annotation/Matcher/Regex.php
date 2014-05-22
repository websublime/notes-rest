<?php
/**
 * This file is part of PhpStorm Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5
 *
 * @category  Support
 * @package   PhpStorm
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @release   GIT: $Id: v0.0.1
 * @link      http://symphonic.websublime.com
 */
namespace League\Notes\Annotation\Matcher;

use League\Notes\Annotation\Matcher\Abstractable\Matcher;
use League\Notes\Annotation\Matcher\Contracts\MatcherInterface;

/**
 * Description
 *
 * @category  Support
 * @package   League\Notes\Annotation\Matcher
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: v0.0.1
 * @link      http://symphonic.websublime.com
 */
class Regex extends Matcher implements MatcherInterface
{
    protected $length = 0;

    public function matches($string, $default = null)
    {
        if (preg_match($this->regex, $string, $matches)) {
            $match = $this->process($matches);
        }

        return isset($match) ? $match : $default;
    }

    protected function process(array $matches)
    {
        return $matches;
    }

    public function getLength()
    {
        return $this->length;
    }

    protected function length($string)
    {
        $this->length = strlen($string);
    }

}
/** @end Regex.php */
