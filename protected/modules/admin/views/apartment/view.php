<?php
$this->breadcrumbs = array(
    'Объекты' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'Обновить', 'url' => array('update', 'id' => $model->id), 'visible' => Yii::app()->user->checkAccess('updateApartment')),
    array('label' => 'Список', 'url' => array('index'), 'visible' => Yii::app()->user->checkAccess('viewApartment')),
    array('label' => 'Удалить', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Вы действительно хотите удалить эту запись?'), 'visible' => Yii::app()->user->checkAccess('manageApartment')),
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
            'template' => '{delete} {make_default}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("admin/apartmentFile/delete", array("id" => $data->id))'
                ),
                'make_default' => array(
                    'label' => 'Сделать основным',
                    'imageUrl' => '/images/icon_publish.png',
                    'visible' => '$data->is_default == 0',
                    'url' => 'Yii::app()->createAbsoluteUrl("admin/apartmentFile/default", array("id" => $data->id))',
                    'click' => "
                        function() {
                            if(!confirm('Сделать это фото основным?')) return false;
                            $.fn.yiiGridView.update('apartment-files-grid', {
                                type:'POST',
                                url:$(this).attr('href'),
                                success:function(data) {
                                    $.fn.yiiGridView.update('apartment-files-grid');
                                }
                            });
                            return false;
                        }
                    ",
                ),
            ),
        ),
    ),
)); ?>
