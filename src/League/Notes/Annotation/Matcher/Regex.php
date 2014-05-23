<?php
/**
 * This file is part of NotesRest Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5
 *
 * @category  Matcher
 * @package   League\Notes\Annotation\Matcher
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @release   GIT: $Id: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
namespace League\Notes\Annotation\Matcher;

use League\Notes\Annotation\Matcher\Abstractable\Matcher;
use League\Notes\Annotation\Matcher\Contracts\MatcherInterface;

/**
 * Class to define regex expression to match.
 *
 * @category  Matcher
 * @package   League\Notes\Annotation\Matcher
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @version   Release: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
class Regex extends Matcher implements MatcherInterface
{
    /**
     * Matches length.
     *
     * @var int
     */
    protected $length = 0;

    /**
     * Applies regex expression to validate content.
     *
     * @param string $string  Content to search
     * @param null   $default Default value
     *
     * @return array|null
     */
    public function matches($string, $default = null)
    {
        if (preg_match($this->regex, $string, $matches)) {
            $match = $this->process($matches);
        }

        return isset($match) ? $match : $default;
    }

    /**
     * Process for length matches.
     *
     * @param array $matches Matches result
     *
     * @return array
     */
    protected function process(array $matches)
    {
        $this->length = count($matches);

        return $matches;
    }

    /**
     * Return matches length.
     *
     * @return int
     */
    public function length()
    {
        return $this->length;
    }
}
/** @end Regex.php */
