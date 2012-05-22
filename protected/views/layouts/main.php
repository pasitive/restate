<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" href="<?php echo $this->assetsUrl; ?>/stylesheet/reset.css" type="text/css"
          media="screen, projection">
    <link rel="stylesheet" href="<?php echo $this->assetsUrl; ?>/stylesheet/960.css" type="text/css"
          media="screen, projection">

    <!--[if IE 6]>
    <script src="http://ie-note.googlecode.com/hg/ie-note.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="<?php echo $this->assetsUrl; ?>/stylesheet/form.css" type="text/css"
          media="screen, projection">
    <link rel="stylesheet" href="<?php echo $this->assetsUrl; ?>/stylesheet/main.css" type="text/css"
          media="screen, projection">
</head>
<body>

<div id="container" class="container_12">

    <div id="header" class="grid_12">
        <a href="<?php echo Yii::app()->homeUrl ?>" id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></a>
    </div>

    <div id="menu_block" class="grid_12">
        <?php $this->widget('zii.widgets.CMenu', array(
        'id' => 'main_navigation',
        'items' => array(
            array('label' => 'Наши объекты', 'url' => Yii::app()->homeUrl, 'active' => Yii::app()->controller->id == 'apartment'),
            array('label' => 'Объекты на карте', 'url' => array('/map/index')),
            array('label' => 'Новости компании', 'url' => array('/news/index'), 'active' => Yii::app()->controller->id == 'news'),
            array('label' => 'Полезная информация', 'url' => array('/page/view', 'id' => 2)),
        ),
    )); ?>
    </div>

    <?php echo $content; ?>

    <div class="grid_12">
        <div id="footer" class="clearfix">

            <div class="footer_wrapper prepend_left">

                <div class="space small"></div>

                <?php if (isset($this->breadcrumbs)): ?>
                    <?php $this->widget('application.components.Breadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'separator' => CHtml::image('/images/breadcrumb_delimeter.png'),
                )); ?><!-- breadcrumbs -->
                <?php endif?>

                <hr class="splitter">

                <ul>
                    <?php foreach (Page::model()->cache(3600)->findAll() as $page) : ?>
                    <?php echo CHtml::link($page->name, array('/page/view', 'id' => $page->id)) ?>
                    <?php endforeach; ?>
                </ul>


                <div class="clear"></div>

                <hr class="splitter">

                <div class="prefix_3 grid_4 alpha">
                    <p class="copyright">
                        &copy; Агенство недвижимости &laquo;Запад&raquo;, ул. Шаболовка 34
                    </p>

                    <?php //Еmail: suhih@zapadrealty.ru, ttoropina@zapadrealty.ru ?>
                </div>

                <div class="grid_4 omega">
                    <div class="footer_logo">
                        <img src="/images/logo_white_small.png">
                    </div>
                </div>

            </div>

            <?php if (YII_DEBUG) : ?>
            <?php
            list($queryCount, $queryTime) = Yii::app()->db->getStats();
            echo "Query count: $queryCount, Total query time: " . sprintf('%0.5f', $queryTime) . "s";
            ?>

            <div>
                Execution Time: <?php echo round(CLogger::getExecutionTime(), 3);?> sec<br/>
                Memory Usage: <?php echo round(CLogger::getMemoryUsage() / 1048576, 2);?> mb
            </div>
            <?php endif; ?>
        </div>

    </div>
</div>

</div>
</body>
</html>