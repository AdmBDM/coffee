<?php
return [
	'language' => 'ru-RU',
	'sourceLanguage' => 'ru-RU',
	'name' => 'Coffee-Tech',
	'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
