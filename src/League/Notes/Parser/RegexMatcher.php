<?php
/**
 * This file is part of PhpStorm Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5
 *
 * @category  Parser
 * @package   League\Notes\Parser
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @release   GIT: $Id: v0.0.1
 * @link      http://symphonic.websublime.com
 */
namespace League\Notes\Parser;

/**
 * Description
 *
 * @category  Parser
 * @package   League\Notes\Parser
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: v0.0.1
 * @link      http://symphonic.websublime.com
 */
class RegexMatcher
{
    private $regex;

    public function __construct($regex)
    {
        $this->regex = $regex;
    }

    public function matches($string, &$value)
    {
        $value = false;

        if (preg_match("/^{$this->regex}/", $string, $matches)) {
            $value = $this->process($matches);
            //return strlen($matches[0]);
        }

        //$value = false;

        return $value;
    }

    protected function process($matches) {
        //return $matches[0];
        return strlen($matches[0]);
    }
}
/** @end RegexMatcher.php */
 