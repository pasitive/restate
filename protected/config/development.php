<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denisboldinov
 * Date: 9/23/11
 * Time: 4:03 PM
 * To change this template use File | Settings | File Templates.
 */

return CMap::mergeArray(
    require_once(__DIR__ . '/main.php'),
    array(
        'modules' => array(
            'gii' => array(
                'class' => 'system.gii.GiiModule',
                'password' => 'qqq',
                'ipFilters' => array('*'),
            ),
        ),
        'components' => array(
            'search' => array(
                'class' => 'ext.DGSphinxSearch.DGSphinxSearch',
                'server' => '127.0.0.1',
                'port' => 9312,
                'maxQueryTime' => 3000,
                'enableProfiling' => 1,
                'enableResultTrace' => 1,
            ),
            'cache' => array(
                'class' => 'CDummyCache',
            ),
            'db' => array(
                'connectionString' => 'mysql:host=localhost;dbname=zapad',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
                'enableProfiling' => true,
                'enableParamLogging' => true,
//                'schemaCachingDuration' => 3600,
            ),
            'log' => array(
                'class' => 'CLogRouter',
                'routes' => array(
                    array(
                        'class' => 'CFileLogRoute',
                        'levels' => 'error, warning',
                    ),
                    /*array(
                        'class' => 'CWebLogRoute',
                    ),*/
                ),
            ),
        ),

        'params' => array(
            'secret' => 'c0018634f1e7cb8788e4bec64f469e52',
            'adminEmail' => 'denis.a.boldinov@gmail.com',
            'uploadDir' => Yii::getPathOfAlias('webroot') . DIRECTORY_SEPARATOR . 'upload',
        ),
    )
);
 
