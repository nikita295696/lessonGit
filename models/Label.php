<?php


class Label extends Control
{
    private $for;

    /**
     * Label constructor.
     * @param $for
     */
    public function __construct($background, $width, $height, $forObject)
    {
        $this->setParentName($forObject);
        $this->setBackground($background);
        $this->setWidth($width);
        $this->setHeight($height);
    }


    /**
     * @return mixed
     */
    public function getParentName()
    {
        return $this->for;
    }

    /**
     *
     * @param Button|Text $for
     */
    public function setParentName($for)
    {
        $this->for = $for->getName();
    }


    function render()
    {
        ob_start();
        include "views/label.php";
        return ob_get_clean();
    }

}