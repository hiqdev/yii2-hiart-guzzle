<?php

namespace hiqdev\hiart\guzzle;

use hiqdev\hiart\AbstractConnection;
use GuzzleHttp\Client as Handler;

/**
 * Guzzle connection implementation.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com> 
 */
class Connection extends AbstractConnection
{
    public $handlerClass = Handler::class;
}
