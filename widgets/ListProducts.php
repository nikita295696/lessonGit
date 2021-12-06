<?php


class ListProducts extends BaseForm
{
    private $arrayProducts;

    /**
     * ListProducts constructor.
     * @param $arrayProducts
     */
    public function __construct($arrayProducts)
    {
        $this->arrayProducts = $arrayProducts;
    }


    /**
     * @return string
     */
    public function render(){
        $arrayProducts = $this->arrayProducts;

        ob_start();
        include "views/list.php";
        return ob_get_clean();
    }
}