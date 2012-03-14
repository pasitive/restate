<?php
$this->breadcrumbs = array(
    'Справочник городов' => array('index'),
    'Добавление'
);

$this->menu = array(
    array('label' => 'Список', 'url' => array('index')),
);
?>

<h1>Добавить город</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>