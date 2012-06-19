<?php

$yii = dirname(__DIR__) . '/framework/framework/yii.php';

if (stripos($_SERVER['HTTP_HOST'], '.dev')) {
    define('IN_DEVELOPMENT_MODE', true);
}

defined('IN_DEVELOPMENT_MODE')
    || define('IN_DEVELOPMENT_MODE', (stripos($_SERVER['HTTP_HOST'], '.dev') ? true : false));

$env = IN_DEVELOPMENT_MODE ? 'development' : 'production';
$config = dirname(__DIR__) . '/protected/config/' . $env . '.php';

if (IN_DEVELOPMENT_MODE) {
// remove the following lines when in production mode
    defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
}

require_once($yii);
Yii::createWebApplication($config)->run();
