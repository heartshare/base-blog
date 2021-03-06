<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'post/index',
    'modules' => [
		'admin' => [
			'class' => 'app\modules\admin\Module',
		],
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'f7p4eRjggPGz0Nrvn-lsZOM15iKgun9I',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'user' => [
            'identityClass' => 'app\modules\admin\models\User',
            'loginUrl' => ['admin/default/login'],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
				'page/<page:\d+>' => 'post/index',
				'tag/<name:\w+>' => 'post/tag',
				'<id>/<slug>' => 'post/view',
				'<action:(about|contact)>' => 'site/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			],
        ],
        'assetManager' => [
			'bundles' => [
				'yii\web\JqueryAsset' => [
					'sourcePath' => null,
					'js' => ['//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js']
				],
			],
		],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
