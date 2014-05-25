<?php
/**
 * This file is part of NotesRest Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5
 *
 * @category  Test
 * @package   League\Notes\Annotation\Matcher\Test
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @release   GIT: $Id: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */

namespace League\Notes\Annotation\Matcher\Test;

use League\Notes\Annotation\Matcher\Regex;

/**
 * Tests for Regex matcher
 *
 * @category  Test
 * @package   League\Notes\Annotation\Matcher\Test
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @version   Release: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
class RegexTest extends \PHPUnit_Framework_TestCase
{

    public function testRegexInstance()
    {
        $this->assertInstanceOf('League\Notes\Annotation\Matcher\Regex', new Regex('/abc/'));
    }

    public function testRegexDefaultValue()
    {
        $regex = new Regex('/abc/');
        $match = $regex->matches('efg', 1);

        $this->assertEquals($match, 1);
    }

    public function testRegexMatchLength()
    {
        $regex = new Regex('/abc/');
        $regex->matches('abc');

        $this->assertEquals($regex->length(), 1);
    }

    public function testRegexFailureMatchWithoutDefaultValue()
    {
        $regex = new Regex('/abc/');
        $match = $regex->matches('efg');

        $this->assertEquals($match, null);
    }
}
/** @end RegexTest.php */
