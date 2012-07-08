<h3><?php echo (!empty($model->parent_id) ? CHtml::link($model->parentName, array('/apartment/view/', 'id' => $model->parent_id)) . ', ' : '') ?><?php echo (empty($model->name) ? CHtml::encode($model->address) : CHtml::encode($model->name) . CHtml::encode(', ' . $model->address)) ?></h3>

<div class="tabbable tabs-below"> <!-- Only required for left/right tabs -->
    <div class="tab-content">
        <div class="tab-pane active" id="apartment-gallery">
            <div class="gallery">
                <ul class="thumbnails">
                    <li class="span6">
                        <div class="thumbnail">
                            <div class="carousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <?php foreach ($apartmentFiles as $i => $apartmentFile) : ?>
                                    <div class="<?php echo ($i == 0 ? 'active' : '') ?> item">
                                        <?php echo CHtml::image($apartmentFile->getFile(450), $model->name, array('width' => '470')) ?>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php foreach ($apartmentFiles as $i => $apartmentFile) : ?>
                    <li class="span1">
                        <div
                            class="thumbnail"><?php echo CHtml::image($apartmentFile->getFile(150), $model->name) ?></div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="tab-pane" id="apartment-on-map" style="height:300px;">
        </div>

        <div class="tab-pane" id="apartment-video">
            <div class="row">
                <iframe title="YouTube video player" class="span6" height="300"
                        src="http://www.youtube.com/embed/fYa0y4ETFVo/?rel=0&hd=1" frameborder="0"
                        allowfullscreen></iframe>
            </div>
        </div>

    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#apartment-gallery" data-toggle="tab">Фотогалерея</a></li>
        <li><a href="#apartment-on-map" data-toggle="tab">Показать на карте</a></li>
        <li><a href="#apartment-video" data-toggle="tab">Видео</a></li>
    </ul>
</div>