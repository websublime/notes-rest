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
use League\Notes\Filesystem\Finder;
use League\Notes\Annotation\Matcher\Contracts\HandlerInterface;

/**
 * Class to manage and process document php comments. PHP array
 * definition creation for each class founded on the passed directory.
 *
 * Example:
 * $config = array(
 *   'dir'   => realpath(__DIR__.'/../tests/League/Notes/Test/Fixtures'),
 *   'regex' => array(
 *      'namespace'   => new Regex('/namespace\s+([\D]+\w*[\\?\w]*\s*);$/mis'),
 *      'description' => new Regex('/(?x)\A([^\n]+(?:(?!(?<=\.)\n|\n{2})\n(?![\t]*@\pL)[^\n]+)*\.?)(?:\s*(?!@\pL)([^\n]+(?:\n+(?![\t]*@\pL)[^\n]+)*))?(\s+[\s\S]*)?/'),
 *      'rest'        => new Regex('/@[A-Z][a-zA-Z0-9_]*\((?<info>{.+})\)$/mis')
 *    )
 * );
 *
 * $manager = new AnnotationManager($config, new MatcherHandler());
 * $manager->init();
 * $manager->process();
 *
 * @category  Notes
 * @package   League\Notes
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @version   Release: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
class AnnotationManager
{
    /**
     * Configuration properties.
     *
     * @var array
     */
    protected $config;

    /**
     * Instance to handler reding files.
     *
     * @var League\Notes\Annotation\Reader
     */
    protected $reader;

    /**
     * Instance to handler regex expressions.
     *
     * @var Annotation\Matcher\Contracts\HandlerInterface
     */
    protected $handler;

    /**
     * Container result reader.
     *
     * @var array
     */
    protected $container = array();

    /**
     * The config array is mandatory to have two keys.
     * Dir key, defines where to search and regex key defines one
     * or more regex to handle.
     *
     * @param array            $config Array configuration
     * @param HandlerInterface $handler Instance matcher handler
     *
     * @throws InvalidArgumentException
     */
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

    /**
     * Method responsable to init our dependencies.
     */
    public function init()
    {
        $this->makeReader();
        $this->registerRegex();
    }

    /**
     * Instanciate our dependencies.
     */
    protected function makeReader()
    {
        $finder = new Finder();
        $this->reader = new Reader($finder, $this->config['dir']);
    }

    /**
     * Register our regex expressions.
     */
    protected function registerRegex()
    {
        foreach ($this->config['regex'] as $name => $expression) {
            $this->handler->add($name, $expression);
        }
    }

    /**
     * Method to iterate thru the directory and
     * retrive information from classes present there.
     *
     * @return NotesRepresentation
     */
    public function process()
    {
        $representation = new NotesRepresentation($this->reader);

        return $representation->generate($this->handler);
    }

    /**
     * Returns a intance from reader.
     *
     * @return League\Notes\Annotation\Reader
     */
    public function getReader()
    {
        return $this->reader;
    }
}
/** @end AnnotationManager.php */
