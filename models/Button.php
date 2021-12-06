<?php


class Button extends Input
{
    private $isSubmit;

    /**
     * Button constructor.
     * @param $isSubmit
     */
    public function __construct($background, $width, $height, $name, $value, $isSubmit)
    {
        $this->isSubmit = $isSubmit;

        $this->setBackground($background);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setName($name);
        $this->setValue($value);
    }


    /**
     * @return mixed
     */
    public function getSubmitState()
    {
        return $this->isSubmit;
    }

    /**
     * @param mixed $isSubmit
     */
    public function setSubmitState($isSubmit)
    {
        $this->isSubmit = $isSubmit;
    }

    function render()
    {
        ob_start();

        include "views/button.php";

        return ob_get_clean();
    }


}