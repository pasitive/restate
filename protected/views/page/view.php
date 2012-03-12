<?php
$pageTitle = (empty($model->routeable_title) ? $model->name : $model->routeable_title);
$this->pageTitle = Yii::app()->name . ' - ' . $pageTitle;
?>
<h1><?php echo $pageTitle ?></h1>
<?php echo $model->body ?>