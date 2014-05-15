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

use League\Notes\Exception\NoteException;

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
class NoteAnnotation
{
    public $value;

    private static $creationStack = array();

    public final function __construct($data = array(), $target = false)
    {
        $reflection = new ReflectionClass($this);
        $class      = $reflection->getName();

        if(isset(self::$creationStack[$class])) {
            //trigger_error("Circular annotation reference on '$class'", E_USER_ERROR);
            //return;
            throw new NoteException("Circular annotation reference on '$class'");
        }

        self::$creationStack[$class] = true;

        foreach ($data as $key => $value) {
            if ($reflection->hasProperty($key)) {
                $this->$key = $value;
            } else {
                //trigger_error("Property '$key' not defined for annotation '$class'");
                throw new NoteException("Property '$key' not defined for annotation '$class'");
            }
        }

        $this->checkTargetConstraints($target);
        $this->checkConstraints($target);

        unset(self::$creationStack[$class]);
    }

    private function checkTargetConstraints($target)
    {
        $reflection = new ReflectionAnnotatedClass($this);

        if ($reflection->hasAnnotation('Target')) {
            $value  = $reflection->getAnnotation('Target')->value;
            $values = is_array($value) ? $value : array($value);

            foreach ($values as $value) {
                if($value == 'class' && $target instanceof ReflectionClass) return;
                if($value == 'method' && $target instanceof ReflectionMethod) return;
                if($value == 'property' && $target instanceof ReflectionProperty) return;
                if($value == 'nested' && $target === false) return;
            }

            if($target === false) {
                //trigger_error("Annotation '".get_class($this)."' nesting not allowed", E_USER_ERROR);
                throw new NoteException("Annotation '".get_class($this)."' nesting not allowed");
            } else {
                //trigger_error("Annotation '".get_class($this)."' not allowed on ".$this->createName($target), E_USER_ERROR);
                throw new NoteException("Annotation '".get_class($this)."' not allowed on ".$this->createName($target));
            }
        }
    }

    private function createName($target)
    {
        if ($target instanceof ReflectionMethod) {
            return $target->getDeclaringClass()->getName().'::'.$target->getName();
        } elseif ($target instanceof ReflectionProperty) {
            return $target->getDeclaringClass()->getName().'::$'.$target->getName();
        } else {
            return $target->getName();
        }
    }

    protected function checkConstraints($target) {}
}
/** @end NoteAnnotation.php */
 