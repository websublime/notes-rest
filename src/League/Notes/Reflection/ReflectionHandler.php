<?php
/**
 * This file is part of NotesRest Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5
 *
 * @category  Reflection
 * @package   League\Notes\Reflection
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @release   GIT: $Id: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */

namespace League\Notes\Reflection;

use League\Notes\Annotation\Matcher\Contracts\HandlerInterface;

/**
 * Class for reflect instances and iterate thru methods to
 * get is comments.
 *
 * @category  Reflection
 * @package   League\Notes\Reflection
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @version   Release: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
class ReflectionHandler
{
    /**
     * Instace or name class.
     * @var string|object
     */
    protected $class;

    /**
     * Instance for regex expression match.
     *
     * @var \League\Notes\Annotation\Matcher\Contracts\HandlerInterface
     */
    protected $matcher;

    /**
     * Collection of sections
     *
     * @var array
     */
    protected $sections = array();

    /**
     * Handles class defined and applies match rules.
     *
     * @param string|object $class Name or instance class
     * @param HandlerInterface $matcher Matcher handler
     *
     * @throws \ErrorException
     */
    public function __construct($class, HandlerInterface $matcher)
    {
        if (class_exists($class)) {
            $this->class   = $class;
            $this->matcher = $matcher;
        } else {
            throw new \ErrorException("Class doesn't exist");
        }
    }

    /**
     * Method to iterate thru defined class.
     *
     * @return array
     */
    public function refactor()
    {
        $reflector  = new \ReflectionClass($this->class);
        $collection = array(
            'class'     => $reflector->name,
            'namespace' => $reflector->getNamespaceName()
        );

        foreach ($reflector->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
            $comment = $this->cleanDocMethod($reflector->getMethod($method->getName())->getDocComment());

            list($description, $rest) = $this->extract($comment);

            $collection[$method->getName()] = array(
                'description' => $description,
                'rest'        => $rest
            );

            isset($rest['section']) ? $this->group($rest['section']) :'';
        }

        return $collection;
    }

    /**
     * Method to get a singular section if defined.
     *
     * @param string $section Section to get
     *
     * @return mixed
     */
    public function getSection($section)
    {
        $needle = array_search(strtolower($section),array_map('strtolower',$this->sections));

        return empty($needle) ? null : $this->sections[$needle];
    }

    /**
     * Method to get all sections register.
     *
     * @return array
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * Method to clean unwanted characters and
     * get rid of new lines.
     *
     * @param $content PHP code
     *
     * @return mixed
     */
    protected function cleanDocMethod($content)
    {
        $doc   = trim(preg_replace('/^(\s*\/\*\*|\s*\*{1,2}\/|\s*\* ?)/m', '', $content));
        $lines = str_replace("\r\n", "\n", $doc);

        return preg_replace('~(?m)\h*$~', '', $lines);
    }

    /**
     * Applies description expression and rest. Main
     * rest documentation is treated here.
     *
     * @param $content PHP Code
     *
     * @return array
     */
    protected function extract($content)
    {
        $description = $this->matcher->match('description', $content);
        $rest        = $this->matcher->match('rest', $content);

        return array(
            isset($description[1]) ? $description[1] : null,
            isset($rest['info']) ? json_decode($rest['info'], true) : null
        );
    }

    /**
     * Method to insert into collection of sections.
     * 
     * @param string $section Section to register
     */
    protected function group($section)
    {
        if (!in_array($section, $this->sections)) {
            $this->sections[] = $section;
        }
    }
}
/** @end ReflectionHandler.php */
