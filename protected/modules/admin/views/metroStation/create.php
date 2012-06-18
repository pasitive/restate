<?php
$this->breadcrumbs = array(
    'Метро' => array('index'),
    'Создать',
);

$this->menu = array(
    array('label' => 'Список', 'url' => array('index'), 'visible' => Yii::app()->user->checkAccess('viewApartment')),
);
?>

<h1>Создать метро</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>