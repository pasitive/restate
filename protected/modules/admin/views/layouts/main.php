<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print"/>
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection"/>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>

    <?php echo CGoogleApi::init(); ?>

    <?php echo CHtml::script(
        CGoogleApi::load('maps', '3', array('other_params' => 'sensor=false&language='.Yii::app()->language)) . "\n"
    ); ?>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

    <div id="header">
        <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
    </div>
    <!-- header -->

    <div id="mainmenu">
        <?php $this->widget('zii.widgets.CMenu', array(
        'items' => array(
            array('label' => 'Справочники', 'url' => '#', 'items' => array(
                array('label' => 'Города', 'url' => array('/admin/city'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Районы', 'url' => array('/admin/area'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Метро', 'url' => array('/admin/metroStation'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Типы объектов', 'url' => array('/admin/apartmentType'), 'visible' => Yii::app()->user->isGuest),
            )),
            array('label' => 'Параметры объектов', 'url' => array('/admin/attribute'), 'visible' => Yii::app()->user->isGuest),

            array('label' => 'Объекты', 'url' => array('/admin/apartment'), 'visible' => Yii::app()->user->isGuest),
            array('label' => 'Создать объект', 'url' => '#', 'visible' => Yii::app()->user->isGuest, 'items' => ApartmentType::getAdminCMenuItems()),

            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
        ),
    )); ?>
    </div>
    <!-- mainmenu -->
    <?php if (isset($this->breadcrumbs)): ?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'links' => $this->breadcrumbs,
    )); ?><!-- breadcrumbs -->
    <?php endif?>

    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">
        Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>
        <br/>
        <?php if (YII_DEBUG) {
        list($queryCount, $queryTime) = Yii::app()->db->getStats();
        echo "Query count: $queryCount, Total query time: " . sprintf('%0.5f', $queryTime) . "s";
    }
        ?>
        <?php if (YII_DEBUG) : ?>
        <div>
            Execution Time: <?php echo round(CLogger::getExecutionTime(), 3);?> sec<br/>
            Memory Usage: <?php echo round(CLogger::getMemoryUsage() / 1048576, 2);?> mb
        </div>
        <?php endif; ?>
    </div>
    <!-- footer -->

</div>
<!-- page -->

</body>
</html>