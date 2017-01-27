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

use Psr\Http\Message\ResponseInterface as Worker;

/**
 * Guzzle response implementation.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class Response extends \hiqdev\hiart\proxy\Response
{
    /**
     * @var Worker
     */
    protected $worker;

    public function getRawData()
    {
        $body = $this->worker->getBody();

        if ($body->isSeekable()) {
            $originalPosition = $body->tell();
            $body->rewind();
            $result = $body->getContents();
            $body->seek($originalPosition);

            return $result;
        }

        return $body->getContents();
    }

    public function __call($name, $args)
    {
        return call_user_func_array([$this->worker, $name], $args);
    }
}
