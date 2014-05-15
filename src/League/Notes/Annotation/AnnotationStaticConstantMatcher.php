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

use League\Notes\Parser\RegexMatcher;
use League\Notes\Exception\AnnotationStaticConstantMatcherException;

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
class AnnotationStaticConstantMatcher extends RegexMatcher
{
    public function __construct()
    {
        parent::__construct('(\w+::\w+)');
    }

    protected function process($matches)
    {
        $name = $matches[1];

        if(!defined($name)) {
            //trigger_error("Constant '$name' used in annotation was not defined.");
            //return false;
            throw new AnnotationStaticConstantMatcherException("Constant '$name' used in annotation was not defined.");
        }

        return constant($name);
    }
}
/** @end AnnotationStaticConstantMatcher.php */
 