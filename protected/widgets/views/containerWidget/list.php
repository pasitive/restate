<ul class="unstyled">
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => $itemView,
    'template' => '{items}'
)) ?>
</ul>



