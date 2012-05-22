<?php
$this->breadcrumbs = array(
    'Объекты' => array('index'),
    $model->name,
);

$this->menu = array(
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
        'metro.name',
        'is_special:boolean',
        'created_at',
        'updated_at',
    ),
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'apartment-files-grid',
    'dataProvider' => new CArrayDataProvider($model->apartmentFiles),
    'filter' => null,
    'columns' => array(
        array(
            'header' => 'Изображение',
            'type' => 'image',
            'value' => '$data->getFile()',
        ),
        'created_at:Время создания',
        /*
          'updated_at',
          */
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("admin/apartmentFile/delete", array("id" => $data->id))'
                ),
            ),
        ),
    ),
)); ?>
