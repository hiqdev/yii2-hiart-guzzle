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
use hiqdev\hiart\ProxyRequest;
use yii\base\InvalidConfigException;

/**
 * Guzzle request implementation.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class Request extends ProxyRequest
{
    protected $workerClass = Worker::class;

    protected function createWorker()
    {
        return new $this->workerClass($this->method, $this->uri, $this->headers, $this->body, $this->version);
    }

    /**
     * {@inheritdoc}
     * @throws InvalidConfigException
     */
    protected function prepareHandlerConfig($config)
    {
        if ($this->getDb()->baseUri) {
            $config['base_uri'] = $this->getDb()->baseUri;
        }
        if (empty($config['base_uri'])) {
            throw new InvalidConfigException('The `baseUri` option must be set in HiArt config');
        }

        if (empty($config['headers']['User-Agent'])) {
            $config['headers']['User-Agent'] = 'HiArt/0.x';
        }

        return $config;
    }

}
