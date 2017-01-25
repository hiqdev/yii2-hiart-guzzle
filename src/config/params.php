<?php
/**
 * Guzzle transport for yii2-hiart
 *
 * @link      https://github.com/hiqdev/yii2-hiart-guzzle
 * @package   yii2-hiart-guzzle
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

return [
    'hiart.enabled'         => true,
    'hiart.class'           => \hiqdev\hiart\rest\Connection::class,
    'hiart.requestClass'    => \hiqdev\hiart\stream\Request::class,
    'hiart.dbname'          => 'hiart',
    'hiart.config'          => [],
    'hiart.baseUri'         => null,
];
