<?php
$this->breadcrumbs = array(
    'Объекты' => array('index'),
    'Список',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('apartment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Список объектов</h1>

<?php echo CHtml::link('Расширенный поиск', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
    'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'apartment-grid',
    'dataProvider' => $model->search(),
    'filter' => null,
    'columns' => array(
        'id',
        'name',
        'city.name',
        'area.name',
        'type.name',
        'created_at',
        /*
          'updated_at',
          */
        array(
            'class' => 'CButtonColumn',
            'template' => '{view} {update} {delete} {publish} {unpublish}',
            'htmlOptions' => array('width' => '80'),
            'buttons' => array(
                'delete' => array(
                    'visible' => "Yii::app()->user->checkAccess('manageApartment')",
                ),
                'publish' => array(
                    'label' => 'Publish',
                    'imageUrl' => '/images/icon_publish.png',
                    'visible' => 'Yii::app()->user->checkAccess("publishApartment") && $data->is_published == 0',
                    'url' => 'Yii::app()->createAbsoluteUrl("admin/apartment/publish", array("id" => $data->id))',
                    'click' => "
                        function() {
                            if(!confirm('Опубликовать?')) return false;
                            $.fn.yiiGridView.update('apartment-grid', {
                                type:'POST',
                                url:$(this).attr('href'),
                                success:function(data) {
                                    $.fn.yiiGridView.update('apartment-grid');
                                }
                            });
                            return false;
                        }
                    ",
                ),
                'unpublish' => array(
                    'label' => 'Unpiblish',
                    'imageUrl' => '/images/icon_unpublish.png',
                    'visible' => 'Yii::app()->user->checkAccess("unpublishApartment") && $data->is_published == 1',
                    'url' => 'Yii::app()->createAbsoluteUrl("admin/apartment/unpublish", array("id" => $data->id))',
                    'click' => "
                        function() {
                            if(!confirm('Отменить публикацию?')) return false;
                            $.fn.yiiGridView.update('apartment-grid', {
                                type:'POST',
                                url:$(this).attr('href'),
                                success:function(data) {
                                    $.fn.yiiGridView.update('apartment-grid');
                                }
                            });
                            return false;
                        }
                    ",
                ),
            ),

        ),
    ),
)); ?>
