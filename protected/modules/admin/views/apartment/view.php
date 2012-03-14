<?php
$this->breadcrumbs = array(
    'Объекты' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'Добавить', 'url' => array('create')),
    array('label' => 'Обновить', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Список', 'url' => array('index')),
    array('label' => 'Удалить', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Вы действительно хотите удалить эту запись?')),
);
?>

<h1>Просмотр объекта</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'city.name',
        'area.name',
        'type.name',
        'created_at',
        'updated_at',
    ),
)); ?>
