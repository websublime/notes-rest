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
 * Reflection Annotation
 *
 * @category  Parser
 * @package   League\Notes\Parser
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: v0.0.1
 * @link      http://symphonic.websublime.com
 */
class CompoundMatcher
{
    protected $matchers = array();

    private $wasConstructed = false;

    public function add($matcher)
    {
        $this->matchers[] = $matcher;
    }

    public function matches($string, &$value)
    {

        if (!$this->wasConstructed) {
            $this->build();
            $this->wasConstructed = true;
        }

        return $this->match($string, $value);
    }

    protected function build() {}
}
/** @end CompoundMatcher.php */
 