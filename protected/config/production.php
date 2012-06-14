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
            'admin' => array(
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
                'class' => 'CFileCache',
            ),
            'db' => array(
                'class' => 'application.components.DbConnection'
            ),
        ),
        'params' => array(
        ),
    )
);
 
