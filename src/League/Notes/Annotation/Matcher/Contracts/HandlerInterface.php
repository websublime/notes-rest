<?php
/**
 * This file is part of NotesRest Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5
 *
 * @category  Contracts
 * @package   League\Notes\Annotation\Matcher\Contracts
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @release   GIT: $Id: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
namespace League\Notes\Annotation\Matcher\Contracts;

/**
 * Description
 *
 * @category  Contracts
 * @package   League\Notes\Annotation\Matcher\Contracts
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @version   Release: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
interface HandlerInterface
{
    /**
     * @param string           $name Matcher name
     * @param MatcherInterface $matcher Matcher instance
     *
     * @return mixed
     */
    public function add($name, MatcherInterface $matcher);
}
/** @end HandlerInterface.php */
 