<?php
/**
 * This file is part of NotesRest Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5
 *
 * @category  Writers
 * @package   League\Notes\Filesystem\Writers
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @release   GIT: $Id: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */

namespace League\Notes\Filesystem\Writers;

use League\Notes\NotesRepresentation;
use League\Notes\Filesystem\Contracts\WriterInterface;

/**
 * Description
 *
 * @category  Writers
 * @package   League\Notes\Filesystem\Writers
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://opensource.org/licenses/MIT MIT License
 * @version   Release: v0.0.1
 * @link      https://github.com/websublime/notes-rest
 */
class BluePrintWriter implements WriterInterface
{
    protected $doc;

    protected $file;

    protected $buffer;

    CONST FORMAT = "FORMAT: 1A";

    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Write documentation representation.
     *
     * @param NotesRepresentation $doc Documentor
     *
     * @return mixed
     */
    public function write(NotesRepresentation $doc)
    {
        // TODO: Implement write() method.
    }
}
/** @end BluePrintWriter.php */
