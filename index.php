<?php

include_once "models/IRenderTag.php";
include_once "models/Control.php";
include_once "models/Input.php";
include_once "models/Button.php";
include_once "models/Text.php";
include_once "models/Label.php";

// Конвертирует Control в HTML разметку
function convertToHTML(Control $control){
    // вернет имя класса
    $className = get_class($control);
    switch ($className){
        case "Text":
            return "Text <br/>" . $control->render();
        case "Button":
            return "Button <br/>" . $control->render();
        case "Label":
            return "Button <br/>" . $control->render();
    }

    return "";
}

$button = new Button("red", 200, 300, "btn", "val", true);
$text = new Text("none", 450, 150, "search", "", "Search");
$label = new Label("yellow", 200, 300, $button);

echo convertToHTML($button);
echo convertToHTML($text);
echo convertToHTML($label);