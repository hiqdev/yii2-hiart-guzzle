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

use GuzzleHttp\Psr7\Request as Worker;
use hiqdev\hiart\AbstractRequest;

/**
 * Guzzle request implementation.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class Request extends AbstractRequest
{
    protected $workerClass = Worker::class;

    protected function createWorker()
    {
        return new $this->workerClass($this->method, $this->uri, $this->headers, $this->body, $this->version);
    }

    /**
     * Sends the request.
     * @param array $options
     * @return Response
     */
    public function send($options = [])
    {
        $handler = $this->builder->db->getHandler();
        $response = $handler->send($this->getWorker(), $options);

        return new Response($response, $this);
    }
}
