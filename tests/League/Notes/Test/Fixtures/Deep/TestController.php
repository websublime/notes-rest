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
     * @Rest({
     *  "section": "Fake",
     *  "title": "Great fake put method",
     *  "resource": {
     *     "class": "League\\Notes\\Test\\Fixtures\\Deep\\TestController",
     *     "method": "getMethod"
     *  },
     *  "description": "Maybe here the description to the response on success and failure",
     *  "request": {
     *     "route": "/api/put",
     *     "method": "PUT",
     *     "parameters": {
     *         "put": {
     *             "validation": "\\d+",
     *             "required": true
     *         }
     *     },
     *     "headers": {
     *         "content-type": "application/json"
     *     }
     *  },
     *  "response": [
     *     {
     *         "content-type": "application/json",
     *         "status": 200,
     *         "link" : "http://link.to.response.success"
     *     },
     *     {
     *         "status": 401,
     *         "link" : "http://link.to.response.failure"
     *     },
     *     {
     *         "status": 400,
     *         "link" : "http://link.to.response.error",
     *         "body" : "Should this exists?"
     *     }
     *  ]
     * })
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
 