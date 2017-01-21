<?php

namespace hiqdev\hiart\guzzle;

use hiqdev\hiart\AbstractRequest;
use GuzzleHttp\Psr7\Request as Worker;

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
