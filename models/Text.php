<?php


class Text extends Input
{
    private $placeholder;

    /**
     * Text constructor.
     * @param $placeholder
     */
    public function __construct($background, $width, $height, $name, $value, $placeholder)
    {
        $this->placeholder = $placeholder;

        $this->setBackground($background);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setName($name);
        $this->setValue($value);
    }


    /**
     * @return mixed
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * @param string $placeholder
     */
    public function setPlaceholder(string $placeholder)
    {
        $this->placeholder = $placeholder;
    }


    function render()
    {
        ob_start();
        include "views/text.php";
        return ob_get_clean();
    }
}

