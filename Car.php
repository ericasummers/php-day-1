<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $picture;

    function __construct($make_model, $price, $miles, $picture)
    {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
        $this->picture = $picture;
    }

    function getPrice()
    {
        return $this->price;
    }
    function setPrice($newPrice)
    {
        $floatPrice = (float) $newPrice;
        $this->price = $floatPrice;
    }

    function getMake_Model()
    {
        return $this->make_model;
    }
    function setMake_Model($newMake_model)
    {
        $this->make_model = $newMake_model;
    }
    function getMiles()
    {
        return $this->miles;
    }
    function setMiles($newMiles)
    {
        $floatMiles = (float) $newMiles;
        $this->miles = $floatMiles;
    }
    function getPicture()
    {
        return $this->picture;
    }
    function setPicture($picture_path)
    {
        $this->picture = $picture_path;
    }

}





$porsche = new Car("2014 Porsche 911", 114991, 7864, "img/porsche.jpg");

$ford = new Car("2011 Ford F450", 55995, 14241, "img/ford.jpg");

$lexus = new Car("2013 Lexus RX 350", 44700, 20000, "img/lexus.png");

$mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "img/benz.png");

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->getPrice() < $_GET["price"] && $car->getMiles() < $_GET["miles"]) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
    <style>
    img{
      width:200px;
      height:auto;
    }
    </style>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            foreach ($cars_matching_search as $car) {
              $carPrice = $car->getPrice();
              $carModel = $car->getMake_model();
              $carMiles = $car->getMiles();
              $carPicture = $car->getPicture();
                echo "<li> $carModel </li>";
                echo "<ul>";
                    echo "<li> $$carPrice </li>";
                    echo "<li> Miles: $carMiles </li>";
                    echo "<li> <img src = '$carPicture'></li>";
                echo "</ul>";
            }
            if (empty($cars_matching_search)) {
              echo "<p>There are no cars matching your search, please try a higher number!</p>";
            }
        ?>
    </ul>
</body>
</html>
