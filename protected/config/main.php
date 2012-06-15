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

    'timeZone' => 'Europe/Moscow',

    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
        'application.widgets.*',
    ),

    // application components
    'components' => array(
        'coreMessages' => array(
            'class' => 'CPhpMessageSource',
            'forceTranslation' => true,
        ),
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
            'loginUrl' => array('/admin/default/login'),
        ),
        'urlManager' => array(
            'class' => 'UrlManager',
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/*' => '<controller>/<action>',
            ),
        ),
        'errorHandler' => array(
            'errorAction' => 'error/error',
        ),
    ),

    'params' => array(
        'cache_expire_time' => 86400,
        'cache_apartment_time' => 3600,
        'secret' => 'c0018634f1e7cb8788e4bec64f469e52',
        'adminEmail' => 'positivejob@yandex.ru',
        'uploadDir' => Yii::getPathOfAlias('webroot') . DIRECTORY_SEPARATOR . 'upload',
    ),
);