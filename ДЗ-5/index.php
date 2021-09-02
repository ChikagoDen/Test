
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Домашнее задание 5</title>
</head>
<body>
    <h1>Главная</h1>
    <hr>
    2. Реализовать паттерн Адаптер для связи внешней библиотеки 
    (классы SquareAreaLib и CircleAreaLib) вычисления площади квадрата 
    (getSquareArea) и площади круга (getCircleArea) с интерфейсами ISquare и 
    ICircle имеющегося кода. Примеры классов даны ниже. Причём во внешней библиотеке
     используются для расчётов формулы нахождения через диагонали фигур,
      а в интерфейсах квадрата и круга — формулы, принимающие значения одной 
      стороны и длины окружности соответственно.
<?php
class CircleAreaLib
{
 
   public function getCircleArea(int $diagonal)
   {
       $M_PI =3.1415926535898; // 3.1415926535898
       $area = ($M_PI * $diagonal**2)/4;

       return $area;
   }
}
class SquareAreaLib
{
   public function getSquareArea(int $diagonal)
   {
       $area = ($diagonal**2)/2;

       return $area;
   }
}
// Имеющиеся интерфейсы:

interface ISquare
{
function squareArea(int $sideSquare);
}

interface ICircle
{
function circleArea(int $circumference);
}

class AdapterCircleAreaLib implements ICircle{

    protected $circleAreaLib = null;
    public function __construct() {
     $this->CircleAreaLib = new CircleAreaLib();
    }

    public function circleArea(int $circumference){
        $M_PI =3.1415926535898;
        $area = 2*$M_PI*$circumference;
        return $area;
    }
}
class AdapterSquareAreaLib implements ISquare{
    protected $squareAreaLib= null;
    public function __construct() {
        $this->squareAreaLib = new SquareAreaLib();
    }
    public function squareArea(int $sideSquare){
        $area = $sideSquare*$sideSquare;
        return $area;
    }
}
//тест адаптера квадрат
$a=new  SquareAreaLib();
echo "<br>".round($a->getSquareArea(7)) ;
$b=new AdapterSquareAreaLib();
echo "<br>".$b->squareArea(5);
echo "<br>".round($a->getSquareArea(7)) ;
?>


 </body>
</html>