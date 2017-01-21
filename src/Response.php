<?php

namespace hiqdev\hiart\guzzle;

use hiqdev\hiart\AbstractResponse as Worker;
use Psr\Http\Message\ResponseInterface;

/**
 * Guzzle response implementation.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com> 
 */
class Response extends AbstractResponse
{
    /**
     * @var Worker
     */
    protected $worker;

    public function getRawData()
    {
        return $this->worker->getBody()->getContents();
    }
}
