<?php
$this->pageTitle = (empty($model->routeable_title) ? $model->title : $model->routeable_title) . ' | ' . Yii::app()->name;
?>

<h1><?php echo $model->title ?></h1>
<?php echo $model->body ?>