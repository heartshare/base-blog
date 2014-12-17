<?php

return [
	'components' => [
		'user' => [
			'class' => 'yii\web\User',
            'identityClass' => 'app\modules\admin\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['default/login'],
        ],
	],
];
