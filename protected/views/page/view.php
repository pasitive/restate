<?php
$this->pageTitle = (empty($model->routeable_title) ? $model->title : $model->routeable_title) . ' | ' . Yii::app()->name;
?>

<legend><?php echo $model->title ?></legend>
<?php echo $model->body ?>