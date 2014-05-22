<?php
/**
 * This file is part of NotesRest Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5
 *
 * @category  Filesystem
 * @package   League\Notes\Filesystem
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @release   GIT: $Id: v0.0.1
 * @link      http://symphonic.websublime.com
 */
namespace League\Notes\Filesystem;

/**
 * Description
 *
 * @category  Filesystem
 * @package   League\Notes\Filesystem
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: v0.0.1
 * @link      http://symphonic.websublime.com
 */
class Finder
{

    /**
     * Get basename solutions.
     *
     * @param string $file   File
     * @param null   $suffix Constants
     *
     * @return string
     */
    public function basename($file, $suffix = null)
    {
        return is_null($suffix) ? basename($file) : basename($file, $suffix);
    }

    /**
     * Verify if path or file exists.
     *
     * @param string $file Path or file
     *
     * @return bool
     */
    public function exists($file)
    {
        return file_exists($file);
    }

    /**
     * Check if is a valid directory.
     *
     * @param $dir directory
     *
     * @return bool
     */
    public function isDir($dir)
    {
        return is_dir($dir);
    }

    /**
     * Check if we can write in a directory.
     *
     * @param $path
     *
     * @return bool
     */
    public function isWritable($path)
    {
        return is_writable($path);
    }

    public function getContent($file)
    {
        return $this->isFile($file) ? file_get_contents($file) : null;
    }

    /**
     * Check if it is a valid file.
     *
     * @param $file
     *
     * @return bool
     */
    public function isFile($file)
    {
        return is_file($file);
    }
}
/** @end Finder.php */
