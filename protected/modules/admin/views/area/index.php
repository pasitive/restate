<?php
$this->breadcrumbs = array(
    'Районы города' => array('index'),
    'Список',
);

$this->menu = array(
    array('label' => 'Добавить', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('area-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Список районов</h1>

<?php echo CHtml::link('Расширенный поиск', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
    'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'area-grid',
    'dataProvider' => $model->search(),
    'filter' => null,
    'columns' => array(
        'id',
        'name',
        array(
            'class' => 'CLinkColumn',
            'header' => 'Город',
            'labelExpression' => '$data->city->name',
            'urlExpression' => 'Yii::app()->createUrl("/admin/city/view/", array("id" => $data->city->id))',
        ),
        'created_at',
        'updated_at',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
