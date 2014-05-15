<?php
/**
 * This file is part of NotesRest Project.
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

use League\Notes\Parser\ParallelMatcher;
use League\Notes\Parser\ConstantMatcher;
use League\Notes\Parser\SimpleSerialMatcher;
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
class AnnotationParametersMatcher extends ParallelMatcher
{
    protected function build()
    {
        $this->add(new ConstantMatcher('', array()));
        $this->add(new ConstantMatcher('\(\)', array()));

        $params_matcher = new SimpleSerialMatcher(1);

        $params_matcher->add(new RegexMatcher('\(\s*'));
        $params_matcher->add(new AnnotationValuesMatcher);
        $params_matcher->add(new RegexMatcher('\s*\)'));

        $this->add($params_matcher);
    }
}
/** @end AnnotationParametersMatcher.php */
 