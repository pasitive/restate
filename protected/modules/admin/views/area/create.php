<?php
$this->breadcrumbs = array(
    'Районы города' => array('index'),
    'Создать',
);

$this->menu = array(
    array('label' => 'Список', 'url' => array('index')),
);
?>

<h1>Создать район</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>