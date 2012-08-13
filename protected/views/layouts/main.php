<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!--
    Skype 'My status' button
    http://www.skype.com/go/skypebuttons
    -->
    <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>

</head>
<body>

<div class="container">

    <div class="span12" id="overtop"><span>Элитная недвижимость на западе Москвы</span></div>

    <div id="top" class="span12">&nbsp;</div>

    <div class="span12" id="header">

        <div class="row">
            <div class="span12" style="background-color: #f0f0f0; height: 20px;"></div>
        </div>

        <div class="row">
            <div class="span2" style="background-color: #f0f0f0; height: 83px;">
                <a href="<?php echo Yii::app()->homeUrl ?>" id="logo"></a>
            </div>
            <div class="span7" style="background-color: #fff;">
                <h3><?php echo CHtml::decode(Yii::app()->name) ?></h3>
                <?php $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'О компании', 'url' => array('/page/view', 'name' => 'about')),
                    array('label' => 'Услуги', 'url' => array('/page/view', 'name' => 'services')),
                    array('label' => 'Оценка', 'url' => array('/page/view', 'name' => 'assessment')),
                    array('label' => 'Вакансии', 'url' => array('/page/view', 'name' => 'vacancies')),
                    array('label' => 'Контакты', 'url' => array('/site/contact')),
                ),
                'htmlOptions' => array('class' => 'navigation main')
            )); ?>
                <hr>
            </div>
            <div class="span3" style="background-color: #f0f0f0;">
                <ul class="unstyled" style="padding-left: 10px;">
                    <li>тел.: 8 917 555 0217</li>
                    <li>тел.: 8 917 555 7561</li>
                    <li>email: <a href="mailto:mail@mail.ru">mail@mail.ru</a></li>
                    <li><a href="skype:boldinovd?call"><img src="http://mystatus.skype.com/smallclassic/boldinovd"
                                                            style="border: none;" width="114" height="20"
                                                            alt="My status"/></a></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="span12" style="height:5px;"></div>

    <div class="span12" id="content-container">
        <div class="row">
            <div class="span2">

                <?php $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'Главная страница', 'url' => array('/apartment/index')),
                    array('label' => 'Аренда квартир', 'url' => array('/apartment/rent')),
                    array('label' => 'Продажа квартир', 'url' => array('/apartment/sale')),
                    array('label' => 'ЖК на карте', 'url' => array('/map/index')),
                ),
                'htmlOptions' => array('class' => 'nav nav-main nav-pills nav-stacked')
            )); ?>


                <legend>ЖК на Западе</legend>
                <?php $this->widget('ContainerListWidget') ?>

            </div>

            <?php echo $content; ?>


        </div>
    </div>

    <div class="span12" id="footer">
        <div style="text-align: center;">
        <hr>
        <?php $this->widget('zii.widgets.CMenu', array(
        'items' => array(
            array('label' => 'О компании', 'url' => array('/page/view', 'name' => 'about')),
            array('label' => 'Услуги', 'url' => array('/page/view', 'name' => 'services')),
            array('label' => 'Оценка', 'url' => array('/page/view', 'name' => 'assessment')),
            array('label' => 'Вакансии', 'url' => array('/page/view', 'name' => 'vacancies')),
            array('label' => 'Контакты', 'url' => array('/site/contact')),
        ),
    )); ?>

        &copy; Агентство элитной недвижимости &laquo;Запад&raquo;
        </div>
    </div>

</div>

<script type="text/javascript" src="<?php echo $this->assetsUrl; ?>/bootstrap/js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="<?php echo $this->assetsUrl; ?>/bootstrap/js/bootstrap-button.js"></script>
<script type="text/javascript" src="<?php echo $this->assetsUrl; ?>/bootstrap/js/bootstrap-tab.js"></script>
<script type="text/javascript" src="<?php echo $this->assetsUrl; ?>/bootstrap/js/bootstrap-carousel.js"></script>
<script type="text/javascript" src="<?php echo $this->assetsUrl; ?>/bootstrap/js/bootstrap-transition.js"></script>
</body>
</html>