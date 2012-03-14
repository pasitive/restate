<?php
$this->breadcrumbs=array(
	'Параметры объектов'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
);
?>

<h1>Создать параметр объекта</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>