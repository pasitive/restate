<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Агентство элитной недвижимости "Запад"',

    'preload' => array('log'),

    'language' => 'ru',

    'defaultController' => 'apartment',

    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
    ),

    // application components
    'components' => array(
        'format' => array(
            'booleanFormat' => array('Нет', 'Да'),
        ),
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            'driver' => 'GD',
            'params' => array('directory' => '/opt/local/bin'),
        ),
        'authManager' => array(
            'class' => 'CDbAuthManager'
        ),
        'user' => array(
            'class' => 'WebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('/session/create'),
        ),
        'urlManager' => array(
            'class' => 'UrlManager',
            'urlSuffix' => '.html',
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(

                'login' => 'session/create',
                'logout' => 'session/delete',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'errorHandler' => array(
            'errorAction' => 'error/error',
        ),
    ),

    'params' => array(
    ),
);