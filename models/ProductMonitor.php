<?php

class ProductMonitor extends Product {
    private $diagonale;

    /**
     * ProductMonitor constructor.
     * @param $diagonale
     */
    public function __construct($_name, $_price, $diagonale)
    {
        parent::__construct($_name, $_price);
        $this->diagonale = $diagonale;
        $this->setCategory(Product::CATEGORY_PRODUCT_MONITOR);
    }

    public function getProduct()
    {
        return "Monitor: " . parent::getProduct() . "Diagonale: " . $this->diagonale;
    }


    public function toJSONArray()
    {
        $json = parent::toJSONArray();

        $json["diagonale"] = $this->diagonale;

        return $json;
    }
}