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
     * Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     * tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
     * veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
     * commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
     * velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
     * occaecat cupidatat non proident, sunt in culpa qui officia deserunt
     * mollit anim id est laborum.
     *
     * @return bool
     *
     * @Rest({
     *  "section": "Test",
     *  "title": "Get test controller",
     *  "resource": {
     *     "class": "League\\Notes\\Test\\Fixtures\\Deep\\TestController",
     *     "method": "getMethod"
     *  },
     *  "description": "Short description",
     *  "request": {
     *     "route": "/api/test/get",
     *     "method": "GET",
     *     "parameters": [],
     *     "headers": {
     *         "content-type": "application/json"
     *     }
     *  },
     *  "response": [
     *     {
     *         "status": 200,
     *         "content-type": "application/json",
     *         "link" : "http://link.to.response.success"
     *     },
     *     {
     *         "status": 401,
     *         "content-type": "application/json",
     *         "link" : "http://link.to.response.failure"
     *     },
     *     {
     *         "status": 400,
     *         "content-type": "application/json",
     *         "link" : "http://link.to.response.error"
     *     }
     *  ]
     * })
     */
    public function getMethod()
    {
        return false;
    }

    /**
     * Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     * tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
     * veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
     * commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
     * velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
     * occaecat cupidatat non proident, sunt in culpa qui officia deserunt
     * mollit anim id est laborum.
     *
     * @return bool
     *
     * @Rest({
     *  "section": "Test",
     *  "title": "Post test controller",
     *  "resource": {
     *     "class": "League\\Notes\\Test\\Fixtures\\Deep\\TestController",
     *     "method": "postMethod"
     *  },
     *  "description": "Short description",
     *  "request": {
     *     "route": "/api/test/post",
     *     "method": "POST",
     *     "parameters": [],
     *     "headers": {
     *         "content-type": "application/json"
     *     }
     *  },
     *  "response": [
     *     {
     *         "status": 200,
     *         "content-type": "application/json",
     *         "link" : "http://link.to.response.success"
     *     },
     *     {
     *         "status": 401,
     *         "content-type": "application/json",
     *         "link" : "http://link.to.response.failure"
     *     },
     *     {
     *         "status": 400,
     *         "content-type": "application/json",
     *         "link" : "http://link.to.response.error"
     *     }
     *  ]
     * })
     */
    public function postMethod()
    {
        return false;
    }

    /**
     * Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     * tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
     * veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
     * commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
     * velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
     * occaecat cupidatat non proident, sunt in culpa qui officia deserunt
     * mollit anim id est laborum.
     *
     * @return bool
     *
     * @Rest({
     *  "section": "Test",
     *  "title": "Put test controller",
     *  "resource": {
     *     "class": "League\\Notes\\Test\\Fixtures\\Deep\\TestController",
     *     "method": "putMethod"
     *  },
     *  "description": "Short description",
     *  "request": {
     *     "route": "/api/test/put",
     *     "method": "PUT",
     *     "parameters": [
     *         {
     *             "validation": "\\d+",
     *             "required": true
     *         }
     *     ],
     *     "headers": {
     *         "content-type": "application/json"
     *     }
     *  },
     *  "response": [
     *     {
     *         "status": 200,
     *         "content-type": "application/json",
     *         "link" : "http://link.to.response.success"
     *     },
     *     {
     *         "status": 401,
     *         "content-type": "application/json",
     *         "link" : "http://link.to.response.failure"
     *     },
     *     {
     *         "status": 400,
     *         "content-type": "application/json",
     *         "link" : "http://link.to.response.error"
     *     }
     *  ]
     * })
     */
    public function putMethod($put = null)
    {
        return is_null($put) ? false : true;
    }
}
/** @end TestController.php */
 