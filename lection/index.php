<?php



class Point{
    public $x;
    public $y;

    /**
     * Point constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function Show(){
        return "x: " . $this->x . ", y: " . $this->y;
    }

    public function op(){
        return $this->x + $this->y;
    }

}

// для наследование классов используется оператор extends
class Rectangle extends Point {
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;

        // оператор parent - мы обращаемся к полям и методам родительского класса
        parent::__construct(42, 34);
    }

    // перезагрузка метода
    public function Show()
    {
        echo $this->op();
        return parent::Show() . ", width: " . $this->width . ", height: " . $this->height;
    }

    // переопределение
    public function op()
    {
        return  "height, " . $this->height . ", width" .  $this->width;
    }
}

$point = new Point(12, 34);

$rectangle = new Rectangle(200, 500);

echo $rectangle->Show()  . "<br/>";

echo $rectangle->x . "X" . $rectangle->y;