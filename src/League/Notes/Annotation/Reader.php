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
class Reader
{

    /**
     * List of known annotations.
     *
     * @var array
     */
    private static $known_annotation = array(
        'fix',
        'fixme',
        'override',
        'abstract',
        'access',
        'code',
        'deprec',
        'endcode',
        'exception',
        'final',
        'ingroup',
        'inheritdoc',
        'inheritDoc',
        'magic',
        'name',
        'toc',
        'tutorial',
        'private',
        'static',
        'staticvar',
        'staticVar',
        'throw',
        'api',
        'author',
        'category',
        'copyright',
        'deprecated',
        'example',
        'filesource',
        'global',
        'ignore',
        'internal',
        'license',
        'link',
        'method',
        'package',
        'param',
        'property',
        'property-read',
        'property-write',
        'return',
        'see',
        'since',
        'source',
        'subpackage',
        'throws',
        'todo',
        'TODO',
        'usedby',
        'uses',
        'var',
        'version',
        'codeCoverageIgnore',
        'codeCoverageIgnoreStart',
        'codeCoverageIgnoreEnd',
        'SuppressWarnings',
        'noinspection',
        'package_version',
    );

    /**
     * Property to ingnore or not known annotations.
     *
     * @var boolean
     */
    private $ignoreKnownAnnotation;

    /**
     * Append more annotations to the list of known annotations.
     *
     * @param string $annotation Annotation name
     */
    public static function appendKnownAnnotation($annotation)
    {
        self::$known_annotation[] = $annotation;
    }

    public function __construct($ignore = true)
    {
        $this->ignoreKnownAnnotation = $ignore;
    }
}
/** @end Reader.php */
 