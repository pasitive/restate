<?php
$this->breadcrumbs=array(
	'Новости'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
);
?>

<h1>Создать новость</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>