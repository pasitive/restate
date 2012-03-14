<?php
$this->breadcrumbs = array(
    'Метро' => array('index'),
    'Создать',
);

$this->menu = array(
    array('label' => 'Список', 'url' => array('index')),
);
?>

<h1>Создать метро</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>