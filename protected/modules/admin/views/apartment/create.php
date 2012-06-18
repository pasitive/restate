<?php
$this->breadcrumbs = array(
    'Объекты' => array('index'),
    'Добавить',
);

$this->menu = array(
    array('label' => 'Список', 'url' => array('index'), 'visible' => Yii::app()->user->checkAccess('viewApartment')),
);
?>

<h1>Добавить объект <?php echo $model->type->name ?></h1>

<?php echo $this->renderPartial('_form', array(
    'model' => $model,
    'attributes' => $attributes,
));
?>