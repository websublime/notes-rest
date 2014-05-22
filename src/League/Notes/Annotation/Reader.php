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

use League\Notes\Filesystem\Finder;
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

    protected $finder;

    protected $searchDir;

    protected $iterator;

    public function __construct(Finder $finder = null, $searchDir = null)
    {
        $this->finder = is_null($finder) ? new Finder() : $finder;
        $this->searchDir = $searchDir;
    }

    /**
     * @return Finder
     */
    public function getFinder()
    {
        return $this->finder;
    }

    /**
     * @return mixed
     */
    public function getIterator()
    {
        return $this->iterator;
    }

    public function setIterator(\SeekableIterator $iterator = null)
    {
        $this->iterator = is_null($iterator) ? new \FilesystemIterator(
        $this->searchDir,
        \FilesystemIterator::KEY_AS_FILENAME |
        \FilesystemIterator::SKIP_DOTS |
        \FilesystemIterator::FOLLOW_SYMLINKS
        ) : $iterator;

        return $this;
    }

    public function getSearchDir()
    {
        return $this->searchDir;
    }

    public function setSearchDir($searchDir)
    {
        $this->searchDir = $searchDir;
    }
}
/** @end Reader.php */
 