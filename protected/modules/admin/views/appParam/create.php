<?php
$this->breadcrumbs=array(
	'App Params'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
);
?>

<h1>Создать AppParam</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>