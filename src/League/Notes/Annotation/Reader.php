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
 * @license   http://opensource.org/licenses/MIT MIT License
 * @release   GIT: $Id: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
namespace League\Notes\Annotation;

use League\Notes\Filesystem\Finder;

/**
 * Class responsable to define iterator for iterate
 * thru directories and finder file reader.
 *
 * @category  Annotation
 * @package   League\Notes\Annotation
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @version   Release: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
class Reader
{
    /**
     * Instance finder.
     *
     * @var \League\Notes\Filesystem\Finder
     */
    protected $finder;

    /**
     * Path directory to search for.
     *
     * @var string
     */
    protected $searchDir;

    /**
     * Instance RecursiveIteratorIterator.
     *
     * @var RecursiveIteratorIterator
     */
    protected $iterator;

    /**
     * Register finder and path for searching. If
     * two arguments defined iterator will be booted.
     *
     * @param Finder $finder Finder instance
     * @param null   $searchDir Directory path
     */
    public function __construct(Finder $finder = null, $searchDir = null)
    {
        $this->finder = is_null($finder) ? new Finder() : $finder;
        $this->searchDir = $searchDir;

        if (!is_null($searchDir) and $finder->isDir($searchDir)) {
            $this->initIterator();
        }
    }

    /**
     * Init our recursive iterator for searching files.
     */
    protected function initIterator()
    {
        $flags = \FilesystemIterator::SKIP_DOTS | \FilesystemIterator::FOLLOW_SYMLINKS;
        $iterator = new \RecursiveDirectoryIterator($this->searchDir, $flags);

        $this->iterator = new \RecursiveIteratorIterator(
        $iterator,
        \RecursiveIteratorIterator::SELF_FIRST
        );
    }

    /**
     * Returns finder instance or null.
     *
     * @return Finder|null
     */
    public function getFinder()
    {
        return $this->finder;
    }

    /**
     * Return RecursiveIteratorIterator instance or null.
     *
     * @return RecursiveIteratorIterator|null
     */
    public function getIterator()
    {
        return $this->iterator;
    }

    /**
     * Return search path.
     *
     * @return string|null
     */
    public function getSearchDir()
    {
        return $this->searchDir;
    }

    /**
     * Set path where to search.
     *
     * @param $searchDir Path to define
     */
    public function setSearchDir($searchDir)
    {
        $this->searchDir = $searchDir;

        if (!is_null($searchDir) and $this->finder->isDir($searchDir)) {
            $this->initIterator();
        }
    }
}
/** @end Reader.php */
