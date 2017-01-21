<?php
/**
 * Guzzle transport for yii2-hiart
 *
 * @link      https://github.com/hiqdev/yii2-hiart-guzzle
 * @package   yii2-hiart-guzzle
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\hiart\guzzle;

use GuzzleHttp\Client as Handler;
use hiqdev\hiart\AbstractConnection;

/**
 * Guzzle connection implementation.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class Connection extends AbstractConnection
{
    public $handlerClass = Handler::class;
}
