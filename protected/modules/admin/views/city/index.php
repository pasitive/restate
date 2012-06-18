<?php
$this->breadcrumbs = array(
    'Справочник городов' => array('index'),
    'Список',
);

$this->menu = array(
    array('label' => 'Добавить', 'url' => array('create'), 'visible' => Yii::app()->user->checkAccess('createApartment')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('city-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Список городов</h1>

<?php echo CHtml::link('Расширенный поиск', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
    'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'city-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        'created_at',
        'updated_at',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'delete' => array(
                    'visible' => "Yii::app()->user->checkAccess('manageApartment')",
                ),
            ),
        ),
    ),
)); ?>
