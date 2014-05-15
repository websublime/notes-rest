<?php
/**
 * This file is part of NotesRest Project.
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
class SerialMatcher extends CompoundMatcher
{
    protected function match($string, &$value)
    {
        $results      = array();
        $total_length = 0;
        $result       = null;

        foreach ($this->matchers as $matcher) {
            $length = $matcher->matches($string, $result);

            if ($length === false) {
                return false;
            }

            $total_length += $length;
            $results[]  = $result;
            $string     = substr($string, $length);
        }

        $value = $this->process($results);

        return $total_length;
    }

    protected function process($results)
    {
        return implode('', $results);
    }
}
/** @end SerialMatcher.php */
 