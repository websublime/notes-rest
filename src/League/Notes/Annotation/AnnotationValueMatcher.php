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
class AnnotationValueMatcher extends ParallelMatcher
{
    protected function build()
    {
        $this->add(new ConstantMatcher('true', true));
        $this->add(new ConstantMatcher('false', false));
        $this->add(new ConstantMatcher('TRUE', true));
        $this->add(new ConstantMatcher('FALSE', false));
        $this->add(new ConstantMatcher('NULL', null));
        $this->add(new ConstantMatcher('null', null));

        $this->add(new AnnotationStringMatcher);
        $this->add(new AnnotationNumberMatcher);
        $this->add(new AnnotationArrayMatcher);
        $this->add(new AnnotationStaticConstantMatcher);
        $this->add(new NestedAnnotationMatcher);
    }
}
/** @end AnnotationValueMatcher.php */
 