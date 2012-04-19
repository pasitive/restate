<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" href="/css/reset.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="/css/960.css" type="text/css" media="screen, projection">

    <!--[if IE 6]>
    <script src="http://ie-note.googlecode.com/hg/ie-note.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="/css/main.css" type="text/css" media="screen, projection">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://api-maps.yandex.ru/2.0/?load=package.full&mode=debug&lang=ru-RU"></script>
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
            array('label' => 'Объекты на карте', 'url' => array('/map/index')),
        ),
    )); ?>
    </div>

    <?php echo $content; ?>

    <div class="grid_12">
        <div id="footer" class="clearfix">

            <div class="footer_wrapper prepend_left">

                <div class="space small"></div>

                <?php if (isset($this->breadcrumbs)): ?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'separator' => CHtml::image('/images/breadcrumb_delimeter.png'),
                )); ?><!-- breadcrumbs -->
                <?php endif?>

                <hr class="splitter">

                <ul>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                </ul>


                <div class="clear"></div>

                <hr class="splitter">

                <div class="prefix_3 grid_4 alpha">
                    <p class="copyright">&copy; Агенство Элитной недвижимости &laquo;Запад&raquo;</p>
                </div>

                <div class="grid_4 omega">
                    <div class="footer_logo">
                        <img src="/images/logo_white_small.png">
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

</div>
</body>
</html>