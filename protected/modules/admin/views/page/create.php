<?php
$this->breadcrumbs=array(
	'Страницы'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
);
?>

<h1>Создать страницу</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>