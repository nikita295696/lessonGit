<?php

include_once "models/IRenderTag.php";
include_once "models/Control.php";
include_once "models/Input.php";
include_once "models/Button.php";
include_once "models/Text.php";
include_once "models/Label.php";

// Конвертирует Control в HTML разметку
function convertToHTML(Control $control){

    switch (true){
        case $control instanceof Button:
            return "Button <br/>" . $control->render();
        case $control instanceof Text:
            return "Text <br/>" . $control->render();
        case $control instanceof Label:
            return $control->render();
    }

    // вернет имя класса
//    $className = get_class($control);
//    switch ($className){
//        case "Text":
//            break;
//    }

    return "";
}

$button = new Button("red", 200, 300, "btn", "val", true);
$text = new Text("none", 450, 150, "search", "", "Search");
$label = new Label("yellow", 200, 300, $button);

echo convertToHTML($button);
echo convertToHTML($text);
echo convertToHTML($label);