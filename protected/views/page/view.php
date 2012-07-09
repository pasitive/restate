<?php
$this->pageTitle = (empty($model->routeable_title) ? $model->name : $model->routeable_title) . ' | ' . Yii::app()->name;
?>

<h1><?php echo $model->name ?></h1>
<?php echo $model->body ?>