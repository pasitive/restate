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
        ),
    ),
)); ?>
