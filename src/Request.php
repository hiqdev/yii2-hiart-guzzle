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
use GuzzleHttp\Psr7\Request as Worker;

/**
 * Guzzle request implementation.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class Request extends \hiqdev\hiart\proxy\Request
{
    protected $responseClass = Response::class;

    protected $handlerClass = Handler::class;

    protected function createWorker()
    {
        return new Worker($this->method, $this->uri, $this->headers, $this->body, $this->version);
    }

    protected function prepareHandlerConfig($config)
    {
        return array_merge([
            'base_uri' => $this->getDb()->getBaseUri(),
        ], $config);
    }

}
