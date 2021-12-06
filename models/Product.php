<?php


class Product
{
    public $_name;
    public $_price;
    private $category;

    private $errors;

    const CATEGORY_PRODUCT_MONITOR = "ProductMonitor";
    const CATEGORY_PRODUCT_PHONE = "ProductPhone";

    /**
     * Product constructor.
     * @param $_name
     * @param $_price
     */
    public function __construct($_name, $_price)
    {
        $this->_name = $_name;
        $this->_price = $_price;
        $this->errors = [];
        $this->category = "";
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }



    // Вывод продукта
    public function getProduct(){
        return "Name: " . $this->_name .
            "; price: " . $this->_price;
    }



    /**
     * Преобразует обьект в JSON строку
     * @return array
     */
    public function toJSONArray(){
        $json = [
            "name" => $this->_name,
            "price" => $this->_price,
            "category" => $this->category,
        ];

        return $json;
    }

    // Преобразует JSON обьект в класс Product
    public static function cloneByJSONArray($json){
        if(isset($json['name']) && isset($json["price"])) {
            $category = $json["category"] ?? "";
            $product = null;

            switch ($category){
                case self::CATEGORY_PRODUCT_MONITOR:
                    $product = new ProductMonitor($json["name"], $json["price"], $json["diagonale"]);
                    break;
                case self::CATEGORY_PRODUCT_PHONE:
                    $product = new ProductPhone($json["name"], $json["price"], $json["countSim"]);
                    break;
            }


            return $product;
        }
        return null;
    }

    /**
     * @return bool
     */
    public function isValid(){
        $isValid = true;
        if(empty($this->_name)){
            $isValid = false;
        }

        if(empty($this->_price)){
            $isValid = false;
        }

        return $isValid;
    }


    /**
     * Поиск продуктов из массива $arrayProducs
     * @param Product[] $arrayProducs
     * @param string $productName
     * @return array
     */
    public static function searchByName($arrayProducs, $productName){
        $filteredArray = [];
        /** @var Product $product */
        foreach ($arrayProducs as $product){
            // если есть искомая строка $productName в поле класс Product
            if(strpos($product->_name, $productName) !== false){
                // добавляем в возвращаемый массив
                $filteredArray[] = $product;
            }
        }

        return $filteredArray;
    }
}