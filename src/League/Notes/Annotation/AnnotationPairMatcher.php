<?php
/**
 * This file is part of NotesRest Project.
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

namespace League\Notes\Annotation;

use League\Notes\Parser\SerialMatcher;
use League\Notes\Parser\RegexMatcher;

/**
 * Description
 *
 * @category  Support
 * @package   League\Notes\Annotation
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: v0.0.1
 * @link      http://symphonic.websublime.com
 */
class AnnotationPairMatcher extends SerialMatcher
{
    protected function build()
    {
        $this->add(new AnnotationKeyMatcher);
        $this->add(new RegexMatcher('\s*=\s*'));
        $this->add(new AnnotationValueMatcher);
    }

    protected function process($parts)
    {
        return array($parts[0] => $parts[2]);
    }
}
/** @end AnnotationPairMatcher.php */
 