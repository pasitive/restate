<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" href="<?php echo $this->assetsUrl; ?>/stylesheet/reset.css" type="text/css"
          media="screen, projection">
    <link rel="stylesheet" href="<?php echo $this->assetsUrl; ?>/stylesheet/960.css" type="text/css"
          media="screen, projection">

    <link rel="stylesheet" href="<?php echo $this->assetsUrl; ?>/stylesheet/form.css" type="text/css"
          media="screen, projection">

    <link rel="stylesheet/less" href="<?php echo $this->assetsUrl; ?>/stylesheet/main.less" type="text/css"
          media="screen, projection">

    <script type="text/javascript" src="<?php echo $this->assetsUrl; ?>/javascript/less-1.3.0.min.js"></script>

    <!--
    Skype 'My status' button
    http://www.skype.com/go/skypebuttons
    -->
    <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>

</head>
<body>

<div id="container" class="container_12">

    <div class="header_wrapper">

        <div id="header" class="grid_12"></div>

        <div id="header_delimiter" class="grid_12"></div>

        <div id="header_menu" class="grid_12">

            <div class="grid_2 alpha omega">
                <a href="<?php echo Yii::app()->homeUrl ?>" id="logo"></a>
            </div>

            <div class="grid_8 alpha omega">
                <div class="centered">
                    <h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
                </div>

                <?php $this->widget('zii.widgets.CMenu', array(
                'id' => 'main_navigation',
                'items' => array(
                    array('label' => 'О компании', 'url' => Yii::app()->homeUrl, 'active' => Yii::app()->controller->id == 'apartment'),
                    array('label' => 'Продать', 'url' => array('/map/index')),
                    array('label' => 'Сдать', 'url' => array('/news/index'), 'active' => Yii::app()->controller->id == 'news'),
                    array('label' => 'Оценка', 'url' => array('/page/view', 'id' => 2)),
                    array('label' => 'Вакансии', 'url' => array('/page/view', 'id' => 2)),
                ),
                'htmlOptions' => array('class' => 'centered'),
            )); ?>

                <div class="clearfix"></div>

            </div>

            <div class="grid_2 alpha omega">
                <ul id="contacts">
                    <li>тел.: 8 999 999 99 99</li>
                    <li>тел.: 8 999 999 99 99</li>
                    <li>email: <a href="mailto:mail@mail.ru">mail@mail.ru</a></li>
                    <li><a href="skype:boldinovd?call"><img src="http://mystatus.skype.com/smallclassic/boldinovd"
                                                            style="border: none;" width="114" height="20"
                                                            alt="My status"/></a></a>
                    </li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="grid_12 alpha omega">

        <div class="space tiny"></div>
        <div class="grid_2 alpha">
            <?php $this->widget('zii.widgets.CMenu', array(
            'id' => 'side_navigation',
            'items' => array(
                array('label' => 'О компании', 'url' => Yii::app()->homeUrl, 'active' => Yii::app()->controller->id == 'apartment'),
                array('label' => 'Продажа', 'url' => array('/map/index')),
                array('label' => 'Аренда', 'url' => array('/news/index'), 'active' => Yii::app()->controller->id == 'news'),
                array('label' => 'ЖК на Западе', 'url' => array('/page/view', 'id' => 2)),
                array('label' => 'Подобрать', 'url' => array('/page/view', 'id' => 2)),
                array('label' => 'Оценка', 'url' => array('/page/view', 'id' => 2)),
                array('label' => 'Собственникам', 'url' => array('/page/view', 'id' => 2)),
            ),
            'htmlOptions' => array('class' => 'centered'),
        )); ?>
        </div>

        <div class="grid_8">
            <?php echo $content; ?>
        </div>

        <div class="grid_2 omega">
            col2
        </div>
    </div>

    <div class="grid_12">
        <div id="footer" class="clearfix">

            <div class="footer_wrapper prepend_left">

                <div class="space small"></div>

                <?php if (isset($this->breadcrumbs)): ?>
                    <?php $this->widget('Breadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'separator' => CHtml::image('/images/breadcrumb_delimeter.png'),
                )); ?><!-- breadcrumbs -->
                <?php endif?>

                <hr class="splitter">

                <ul>
                    <?php foreach (Page::model()->cache(3600)->findAll() as $page) : ?>
                    <?php echo CHtml::link($page->name, array('/page/view', 'id' => $page->id, 'name' => Common::getUri($page->name, 'page'))) ?>
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