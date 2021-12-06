<?php

/**
 * Статический файл для сохранения JSON массива в файл и чтения из файла
*/
class ProductsRepository
{
    // статический массив Product[]
    private static $arrayProducts = [];

    private static $fileName = "user.json";

    // Считывает JSON массив и преобразует его в массив Product
    public static function readFileJSON(){

        $userJson = [];
        // если файл присутствует, то парсим его
        if(file_exists(self::$fileName)) {
            // получаем массив JSON
            $userJson = file_get_contents(self::$fileName);

            // очищаем статический массив
            self::$arrayProducts = [];
            // массив json
            $json = json_decode($userJson, true);
            foreach ($json as $jsonProduct){
                // преобразования обьекта JSON в класс Product
                $product = Product::cloneByJSONArray($jsonProduct);
                if($product != null){
                    self::$arrayProducts[] = $product;
                }
            }


        }
    }

    // сохраняем массив Product в массив JSON
    public static function saveFileJSON(){
        // преобразование массива products в JSON строку

        $json = [];

        /** @var Product $prodJson */
        foreach (self::$arrayProducts as $prodJson){
            // Преобразование класса Product в JSON обьект (асоциативный массив)
            $json[] = $prodJson->toJSONArray();
        }

        $jsonStr = json_encode($json);

        // запись JSON строки в файл
        file_put_contents(self::$fileName, $jsonStr);
    }

    /**
     * @return array
     */
    public static function getArrayProducts()
    {
        return self::$arrayProducts;
    }

    /**
     * @param Product $product
     */
    public static function setProduct($product){
        self::$arrayProducts[] = $product;

    }

}