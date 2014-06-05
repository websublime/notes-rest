<?php
/**
 * This file is part of NotesRest Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5
 *
 * @category  Notes
 * @package   League\Notes
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @release   GIT: $Id: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */

namespace League\Notes;

use League\Notes\Annotation\Reader;
use League\Notes\Reflection\ReflectionHandler;
use League\Notes\Annotation\Matcher\Contracts\HandlerInterface;

/**
 * Class to make array representation of documentation.
 *
 * @category  Notes
 * @package   League\Notes
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @version   Release: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
class NotesRepresentation
{
    /**
     * Reader instance.
     *
     * @var Annotation\Reader
     */
    protected $reader;

    /**
     * Documentation representation result.
     *
     * @var array
     */
    protected $representation = array();

    /**
     * Construct class with reader instance.
     *
     * @param Reader $reader
     */
    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * Method to read all methods on class and get
     * comments and construct the representation array.
     *
     * @param HandlerInterface $matcher Macther handler instance
     *
     * @return NotesRepresentation
     */
    public function generate(HandlerInterface $matcher)
    {
        $iterator = $this->reader->getIterator();
        $finder   = $this->reader->getFinder();

        foreach ($iterator as $iterate) {
            if ($iterate->getExtension() == 'php') {
                $content = $finder->getContent(
                    $iterate->getPath().'/'.$iterate->getFilename()
                );

                $namespace = $this->processNamespace($matcher, $content);
                $class     = empty($namespace) ?
                            $iterate->getBasename('.php') :
                            '\\'.$namespace.'\\'.$iterate->getBasename('.php');

                try {
                    $classHandler = new ReflectionHandler($class, $matcher);

                    $data             = $classHandler->refactor();
                    $data['path']     = $iterate->getPath();
                    $data['instance'] = $classHandler;

                    $this->representation[$iterate->getBasename('.php')] = $data;

                } catch (\ErrorException $e) {
                    //var_dump($e);
                }

            }
        }

        ksort($this->representation);

        return $this;
    }

    /**
     * Search if namespace is defined on document.
     *
     * @param $content PHP Code
     *
     * @return mixed|string
     */
    protected function processNamespace($matcher, $content)
    {
        $namespace = $matcher->match('namespace', $content);

        return empty($namespace) ? '' : array_pop($namespace);
    }

    /**
     * Gets representation doc array.
     *
     * @return array
     */
    public function getRepresentation()
    {
        return $this->representation;
    }
}
/** @end NotesRepresentation.php */
