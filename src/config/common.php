<?php
/**
 * Guzzle transport for yii2-hiart
 *
 * @link      https://github.com/hiqdev/yii2-hiart-guzzle
 * @package   yii2-hiart-guzzle
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

return empty($params['hiart.enabled']) ? [] : [
    'modules' => array_filter([
        'debug' => empty($params['debug.enabled']) ? null : [
            'panels' => [
                'hiart' => [
                    'class' => \hiqdev\hiart\debug\DebugPanel::class,
                ],
            ],
        ],
    ]),
    'components' => array_filter([
        $params['hiart.dbname'] => array_filter([
            'class' => $params['hiart.class'],
            'requestClass' => $params['hiart.requestClass'],
            'name' => $params['hiart.dbname'],
            'config' => $params['hiart.config'],
            'baseUri' => $params['hiart.baseUri'],
        ]),
    ]),
    'container' => [
        'singletons' => [
            \hiqdev\hiart\ConnectionInterface::class => function () {
                return Yii::$app->get(Yii::$app->params['hiart.dbname']);
            },
        ],
    ],
];
