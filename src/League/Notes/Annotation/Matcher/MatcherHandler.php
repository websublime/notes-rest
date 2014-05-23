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
 * @license   http://opensource.org/licenses/MIT MIT License
 * @release   GIT: $Id: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */

namespace League\Notes\Annotation\Matcher;

use League\Notes\Annotation\Matcher\Contracts\MatcherInterface;
use League\Notes\Annotation\Matcher\Contracts\HandlerInterface;

/**
 * Register and add Regex matchers. Applies match validation on regex.
 *
 * @category  Matcher
 * @package   League\Notes\Annotation\Matcher
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @version   Release: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
class MatcherHandler implements HandlerInterface
{
    /**
     * Matchers registered.
     *
     * @var array
     */
    protected $matchers = array();

    /**
     * Register a matcher.
     *
     * @param string           $name Matcher name
     * @param MatcherInterface $matcher Matcher instance
     */
    public function add($name, MatcherInterface $matcher)
    {
        $this->matchers[$name] = $matcher;
    }

    /**
     * Applies match regex expression to content.
     *
     * @param string $name Matcher name
     * @param string $content Content to verify
     * @param null   $default Default result
     *
     * @return mixed
     */
    public function match($name, $content, $default = null)
    {
        return $this->matchers[$name]->matches($content, $default);
    }
}
/** @end MatcherHandler.php */
