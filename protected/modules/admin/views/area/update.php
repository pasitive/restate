<?php
$this->breadcrumbs = array(
    'Районы города' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    'Обновление',
);

$this->menu = array(
    array('label' => 'Добавить', 'url' => array('create'), 'visible' => Yii::app()->user->checkAccess('createApartment')),
    array('label' => 'Просмотр', 'url' => array('view', 'id' => $model->id), 'visible' => Yii::app()->user->checkAccess('viewApartment')),
    array('label' => 'Список', 'url' => array('index'), 'visible' => Yii::app()->user->checkAccess('viewApartment')),
);
?>

<h1>Обновить район <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>