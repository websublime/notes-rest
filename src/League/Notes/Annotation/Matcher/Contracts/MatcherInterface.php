<?php
/**
 * This file is part of NotesRest Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5
 *
 * @category  Matcher
 * @package   League\Notes\Annotation\Matcher
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @release   GIT: $Id: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
namespace League\Notes\Annotation\Matcher\Contracts;

/**
 * Matcher contract.
 *
 * @category  Matcher
 * @package   League\Notes\Annotation\Matcher
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
interface MatcherInterface
{
    /**
     * @param string $string Content string
     * @param null   $default Default value
     *
     * @return mixed
     */
    public function matches($string, $default = null);
}
/** @end MatcherInterface.php */
 