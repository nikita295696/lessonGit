<?php

$arrayRandom = [];

for($i = 0; $i<100; $i++){
    $arrayRandom[] = rand(0, 100);
}

foreach ($arrayRandom as $item){
    echo $item . " ";
}

echo "<br/>";
echo "Min: " . min($arrayRandom) . "<br/>";
echo "Max: " . max($arrayRandom) . "<br/>";

$str = "123354";
$arrayNums = str_split($str);
var_dump($arrayNums);
