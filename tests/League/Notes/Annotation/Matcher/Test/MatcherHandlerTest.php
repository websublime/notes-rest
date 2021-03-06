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
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @release   GIT: $Id: v0.0.1
 * @link      http://symphonic.websublime.com
 */

namespace League\Notes\Annotation\Matcher\Test;

use League\Notes\Annotation\Matcher\MatcherHandler;

/**
 * Description
 *
 * @category  Test
 * @package   League\Notes\Annotation\Matcher\Test
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: v0.0.1
 * @link      http://symphonic.websublime.com
 */
class MatcherHandlerTest extends \PHPUnit_Framework_TestCase
{

    public function testMactherHandlerInstance()
    {
        $this->assertInstanceOf('League\Notes\Annotation\Matcher\MatcherHandler', new MatcherHandler());
    }
}
/** @end MatcherHandlerTest.php */
