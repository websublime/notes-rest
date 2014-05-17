<?php
/**
 * This file is part of PhpStorm Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5
 *
 * @category  Support
 * @package   PhpStorm
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @release   GIT: $Id: v0.0.1
 * @link      http://symphonic.websublime.com
 */
namespace League\Notes\Test\Fixtures;

/**
 * Description
 *
 * @category  Support
 * @package   League\Notes\Test\Fixtures
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: v0.0.1
 * @link      http://symphonic.websublime.com
 *
 * @Resource FakeController
 */
class FakeController
{

    /**
     * Grat fake method
     * @return bool
     *
     * @Rest(
     *  @route /api/get
     *  @method GET
     *  @args simple
     * )
     */
    public function getMethod()
    {
        return false;
    }

    /**
     * Grat fake method
     * @return bool
     *
     * @Rest(
     *  @route /api/post
     *  @method POST
     *  @args simple
     * )
     */
    public function postMethod()
    {
        return false;
    }

    /**
     * Grat fake method
     * @return bool
     *
     * @Rest(
     *  @route /api/put
     *  @method PUT
     *  @args simple
     * )
     */
    public function putMethod()
    {
        return false;
    }

    /**
     * Grat fake method
     * @return bool
     *
     * @Rest(
     *  @route /api/delete
     *  @method DELETE
     *  @args simple
     * )
     */
    public function deleteMethod()
    {
        return false;
    }

    /**
     * Grat fake method
     * @return bool
     *
     * @Rest(
     *  @route /api/patch
     *  @method PATCH
     *  @args simple
     * )
     */
    public function patchMethod()
    {
        return false;
    }

    /**
     * Grat fake method
     * @return bool
     *
     * @Rest(
     *  @route /api/link
     *  @method LINK
     *  @args simple
     * )
     */
    public function linkMethod()
    {
        return false;
    }
}
/** @end FakeController.php */
 