<?php
$this->widget('zii.widgets.CListView', array(
    'id' => 'favorites-list',
    'dataProvider' => $dataProvider,
    'itemView' => 'favoritesWidget/_item',
    'template' => "{items}",
));
?>
