<?php
$this->breadcrumbs = array(
    'Параметры объектов' => array('index'),
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
	$.fn.yiiGridView.update('attribute-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Список параметров объектов</h1>

<?php echo CHtml::link('Расширенный поиск', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
    'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'attribute-grid',
    'dataProvider' => $model->search(),
    'filter' => null,
    'rowCssClassExpression' => '($data->disabled) ? "disabled" : ""',
    'columns' => array(
        'id',
        'name',
        'apartmentType.name',
        'disabled:boolean',
        'created_at',
        'updated_at',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
