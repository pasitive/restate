<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet/less" href="<?php echo $this->assetsUrl; ?>/stylesheet/less/main.less">

    <script type="text/javascript" src="<?php echo $this->assetsUrl; ?>/javascript/less-1.3.0.min.js"></script>

    <!--
    Skype 'My status' button
    http://www.skype.com/go/skypebuttons
    -->
    <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>

</head>
<body>

<div class="container">

    <div id="top" class="span12">&nbsp;</div>

    <div class="span12" id="header">

        <div class="row">
            <div class="span12" style="background-color: #f0f0f0; height: 20px;"></div>
        </div>

        <div class="row">
            <div class="span3" style="background-color: #f0f0f0; height: 83px;">
                <a href="<?php echo Yii::app()->homeUrl ?>" id="logo"></a>
            </div>
            <div class="span6" style="background-color: #fff;">
                <h3><?php echo CHtml::decode(Yii::app()->name) ?></h3>
                <?php $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'О компании', 'url' => Yii::app()->homeUrl, 'active' => Yii::app()->controller->id == 'apartment'),
                    array('label' => 'Продать', 'url' => array('/map/index')),
                    array('label' => 'Сдать', 'url' => array('/news/index'), 'active' => Yii::app()->controller->id == 'news'),
                    array('label' => 'Оценка', 'url' => array('/page/view', 'id' => 2)),
                    array('label' => 'Вакансии', 'url' => array('/page/view', 'id' => 2)),
                ),
                'htmlOptions' => array('class' => 'navigation main')
            )); ?>

                <hr>
            </div>
            <div class="span3" style="background-color: #f0f0f0;">
                <ul class="unstyled" style="padding-left: 10px;">
                    <li>тел.: 8 999 999 99 99</li>
                    <li>тел.: 8 999 999 99 99</li>
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

            <div class="span3">
                <?php $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'Аренда', 'url' => array('/apartment/rent')),
                    array('label' => 'Продажа', 'url' => array('/apartment/sale')),
                ),
                'htmlOptions' => array('class' => 'well navigation left')
            )); ?>


                <legend>Жилые комплексы</legend>
                <?php $this->widget('ContainerListWidget') ?>

            </div>

            <?php echo $content; ?>


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