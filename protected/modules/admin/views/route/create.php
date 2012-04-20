<?php
$this->breadcrumbs=array(
	'Routes'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
);
?>

<h1>Создать Route</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>