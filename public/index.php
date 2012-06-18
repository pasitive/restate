<?php

// change the following paths if necessary
$yii = dirname(__DIR__) . '/framework/framework/yii.php';
$config = dirname(__DIR__) . '/protected/config/production.php';

// remove the following lines when in production mode
//defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
//defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

// start profiling
//xhprof_enable();

require_once($yii);
Yii::createWebApplication($config)->run();


/*// stop profiler
    $xhprof_data = xhprof_disable();
    set_include_path(get_include_path() . PATH_SEPARATOR . '/Users/denisboldinov/Sites/global');

    include_once "tools/xhprof_lib/utils/xhprof_lib.php";
    include_once "tools/xhprof_lib/utils/xhprof_runs.php";

// save raw data for this profiler run using default
// implementation of iXHProfRuns.
    $xhprof_runs = new XHProfRuns_Default();

// save the run under a namespace "xhprof_foo"
    $run_id = $xhprof_runs->save_run($xhprof_data, "zapad.dev");

    print "<a href='http://tools.dev/xhprof/index.php?run=$run_id&source=zapad.dev'>PROFILER</a>";*/
