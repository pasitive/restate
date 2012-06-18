<?php
$this->breadcrumbs = array(
    'Типы объектов' => array('index'),
    'Создать',
);

$this->menu = array(
    array('label' => 'Список', 'url' => array('index'), 'visible' => Yii::app()->user->checkAccess('viewApartment')),
);
?>

<h1>Создать тип объекта</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>