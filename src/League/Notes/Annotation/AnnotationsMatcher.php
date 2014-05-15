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
class AnnotationsMatcher
{
    public function matches($string, &$annotations)
    {
        $data               = null;
        $annotations        = array();
        $annotation_matcher = new AnnotationMatcher;

        while (true) {
            if (preg_match('/\s(?=@)/', $string, $matches, PREG_OFFSET_CAPTURE)) {
                $offset = $matches[0][1] + 1;
                $string = substr($string, $offset);
            }  else {
                return; // no more annotations
            }

            if (($length = $annotation_matcher->matches($string, $data)) !== false) {
                $string = substr($string, $length);
                list($name, $params) = $data;
                $annotations[$name][] = $params;
            }
        }
    }
}
/** @end AnnotationsMatcher.php */
 