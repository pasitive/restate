<div id="language-select">
    <?php
    if (sizeof($languages) < 4) {
        // Render options as links
        $lastElement = end($languages);
        foreach ($languages as $key => $lang) {
            if ($key != $currentLang) {
                echo CHtml::link(
                    $lang,
                    $this->getOwner()->createMultilanguageReturnUrl($key));
            } else echo '<b>' . $lang . '</b>';
            if ($lang != $lastElement) echo ' | ';
        }
    } else {
        // Render options as dropDownList
        echo CHtml::form();
        foreach ($languages as $key => $lang) {
            echo CHtml::hiddenField(
                $key,
                $this->getOwner()->createMultilanguageReturnUrl($key));
        }
        echo CHtml::dropDownList('language', $currentLang, $languages,
            array(
                'submit' => '',
            )
        );
        echo CHtml::endForm();
    }
    ?>
</div>