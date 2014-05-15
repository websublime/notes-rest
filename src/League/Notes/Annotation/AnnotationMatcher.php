<?php
/**
 * This file is part of PhpStorm Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5
 *
 * @category  Annotation
 * @package   League\Notes\Annotation
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
 * @category  Annotation
 * @package   League\Notes\Annotation
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: v0.0.1
 * @link      http://symphonic.websublime.com
 */
class AnnotationMatcher extends SerialMatcher
{
    protected function build()
    {
        $this->add(new RegexMatcher('@'));
        $this->add(new RegexMatcher('[A-Z][a-zA-Z0-9_]*'));
        $this->add(new AnnotationParametersMatcher);
    }

    protected function process($results)
    {
        return array($results[1], $results[2]);
    }
}
/** @end AnnotationMatcher.php */
 