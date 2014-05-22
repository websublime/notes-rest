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
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @release   GIT: $Id: v0.0.1
 * @link      http://symphonic.websublime.com
 */
namespace League\Notes;

use League\Notes\Annotation\Reader;
use League\Notes\Filesystem\Finder;
use League\Notes\Annotation\Matcher\Contracts\HandlerInterface;

/**
 * Description
 *
 * @category  Notes
 * @package   League\Notes
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: v0.0.1
 * @link      http://symphonic.websublime.com
 */
class AnnotationManager
{
    protected $config;

    protected $reader;

    protected $handler;

    protected $container = array();

    public function __construct(array $config, HandlerInterface $handler)
    {
        if (!array_key_exists('dir', $config)) {
            throw new InvalidArgumentException('Please add dir key to array to define search directory');
        }

        if (!array_key_exists('regex', $config)) {
            throw new InvalidArgumentException('Please add regex key with an array of name=>expressions to do.');
        }

        $this->config  = $config;
        $this->handler = $handler;
    }

    public function make(\SeekableIterator $iterator = null)
    {
        $this->makeReader($iterator);
        $this->buildRegex();
    }

    public function process()
    {
        $iterator = $this->reader->getIterator();
        $finder   = $this->reader->getFinder();

        foreach ($iterator as $iterate) {
            if ($iterate->getExtension() == 'php') {
                $content = $finder->getContent($iterate->getPath().'/'.$iterate->getFilename());

                $namespace = $this->processNamespace($content);
            }
        }
    }

    public function getReader()
    {
        return $this->reader;
    }

    protected function processNamespace($content)
    {
        $namespace = $this->handler->match('namespace', $content);

        return empty($namespace) ? '' : array_pop($namespace);
    }

    protected function makeReader($iterator)
    {
        $finder = new Finder();

        $this->reader = new Reader($finder, $this->config['dir']);

        is_null($iterator) ? $this->reader->setIterator() : $this->reader->setIterator($iterator);
    }

    protected function buildRegex()
    {
        foreach ($this->config['regex'] as $name => $expression ) {
            $this->handler->add($name, $expression);
        }
    }
}
/** @end AnnotationManager.php */
 