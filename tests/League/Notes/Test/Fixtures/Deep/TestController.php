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
namespace League\Notes\Test\Fixtures\Deep;

/**
 * Description
 *
 * @category  Support
 * @package   League\Notes\Test\Fixtures\Deep
 * @author    Miguel Ramos <miguel.marques.ramos@gmail.com>
 * @copyright 2012-2014 Websublime.com
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: v0.0.1
 * @link      http://symphonic.websublime.com
 *
 * @Resource TestController
 */
class TestController
{

    /**
     * Grab fake method with single line.
     *
     * @return bool
     * @Rest({"route": "/api/get", "method": "GET", "response": 200, "type": "application/json","parameters": {},"arguments": {}})
     */
    public function getMethod()
    {
        return false;
    }

    /**
     * Grab fake method with
     * multi line description.
     *
     * @return bool
     * @Rest({"route": "/api/post", "method": "POST", "response": 200, "type": "application/json","parameters": {},"arguments": {}})
     */
    public function postMethod()
    {
        return false;
    }

    /**
     * Grab fake method with
     * multi line description with parameter.
     *
     * @param null $put Argument
     *
     * @return bool
     *
     * @Rest({
     *  "route": "/api/put",
     *  "method": "PUT",
     *  "response": 200,
     *  "type": "application/json",
     *  "parameters": {},
     *  "arguments": {
     *      "put": {
     *          "type": "null",
     *          "default": "null"
     *      }
     *  }
     * })
     */
    public function putMethod($put = null)
    {
        return is_null($put) ? false : true;
    }
}
/** @end TestController.php */
 