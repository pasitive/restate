<?php
$this->breadcrumbs = array(
    'Районы города' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'Добавить', 'url' => array('create'), 'visible' => Yii::app()->user->checkAccess('createApartment')),
    array('label' => 'Обновить', 'url' => array('update', 'id' => $model->id), 'visible' => Yii::app()->user->checkAccess('updateApartment')),
    array('label' => 'Список', 'url' => array('index'), 'visible' => Yii::app()->user->checkAccess('viewApartment')),
    array('label' => 'Удалить', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Вы действительно хотите удалить эту запись?'), 'visible' => Yii::app()->user->checkAccess('manageApartment')),
);
?>

<h1>Просмотр района</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'city.name',
        'created_at',
        'updated_at',
    ),
)); ?>
