<?php
foreach ($model->apartmentAttributes as $id => $attribute) {
    if ($attributes[$id]->disabled == 0) {
        $this->renderPartial('/apartmentAttribute/types/_type1', array(
            'id' => $id,
            'attributes' => $attributes,
            'attribute' => $attribute
        ));
    }
}
?>