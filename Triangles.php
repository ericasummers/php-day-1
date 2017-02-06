<?php
class Triangle
{
    private $sideA;
    private $sideB;
    private $sideC;

    function __construct($sideA, $sideB, $sideC){
      $this->sideA = $sideA;
      $this->sideB = $sideB;
      $this->sideC = $sideC;
    }

    function getSideA(){
        return $this->sideA;
    }
    function setSideA($newSideA){
        $floatSideA = (float) $newSideA;
        $this->sideA = $floatSideA;
    }
    function getSideB(){
        return $this->sideB;
    }
    function setSideB($newSideB){
        $floatSideB = (float) $newSideB;
        $this->sideB = $floatSideB;
    }
    function getSideC(){
        return $this->sideC;
    }
    function setSideC($newSideC){
        $floatSideC = (float) $newSideC;
        $this->sideC = $floatSideC;
    }

    function triangleType(){
        if (($this->sideA > ($this->sideB + $this->sideC)) || ($this->sideB > ($this->sideA + $this->sideC)) || ($this->sideC > ($this->sideB + $this->sideA))) {
            return "not a triangle.";
        } else if($this->sideA == $this->sideB && $this->sideA == $this->sideC){
            return "equilateral";
        } else if ($this->sideA == $this->sideB || $this->sideA == $this->sideC || $this->sideC == $this->sideB){
            return "isosceles";
        } else if(!(($this->sideA == $this->sideB || $this->sideA == $this->sideC || $this->sideC == $this->sideB))){
            return "scalene";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Triangle Results</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
  <h2>Triangle Results</h2>
  <p>You entered the following dimensions:</p>
  <ul>
    <?php

        $sideA = $_GET["sideA"];
        $sideB = $_GET["sideB"];
        $sideC = $_GET["sideC"];

    if(!$sideA || !$sideB || !$sideC) {
        echo "<li>Please enter all dimensions for your triangle!</li>";

    } else {
        $triangle = new Triangle($sideA, $sideB, $sideC);

        $mySideA = $triangle->getSideA();
        $mySideB = $triangle->getSideB();
        $mySideC = $triangle->getSideC();
        $shapeType = $triangle->triangleType();

        echo "<li>Side A is $mySideA centimeters</li>";
        echo "<li>Side B is $mySideB centimeters</li>";
        echo "<li>Side C is $mySideC centimeters</li>";
        echo "<li>Your shape is $shapeType</li>";
    }
    ?>
  </ul>
</body>
</html>
