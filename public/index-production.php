<?php

// change the following paths if necessary
$yii = dirname(__DIR__) . '/framework/framework/yii.php';
$config = dirname(__DIR__) . '/protected/config/production.php';

require_once($yii);
Yii::createWebApplication($config)->run();
