<?php
class Parcel
{
    private $width;
    private $height;
    private $length;
    private $weight;
    function __construct($length, $width, $height, $weight)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->weight = $weight;
    }

    function getWidth()
    {
        return $this->width;
    }
    function setWidth($newWidth)
    {
        $floatWidth = (float) $newWidth;
        $this->width = $floatWidth;
    }
    function getHeight()
    {
        return $this->height;
    }
    function setHeight($newHeight)
    {
        $floatHeight = (float) $newHeight;
        $this->height = $floatHeight;
    }
    function getLength()
    {
        return $this->length;
    }
    function setLength($newLength)
    {
        $floatLength = (float) $newLength;
        $this->length = $floatLength;
    }
    function getWeight()
    {
        return $this->weight;
    }
    function setWeight($newWeight)
    {
        $floatWeight = (float) $newWeight;
        $this->weight = $floatWeight;
    }
    function volume()
    {
        return (float) $this->length * $this->width * $this->height;
    }
    function costToShip()
    {
        return (float) ($this->volume() * 12) + ($this->weight * 1);
    }
}

$golfClub = new Parcel(1.5, .15, .15, 3.2);
$redwoodSapling = new Parcel(.30, .5, .5, .2);
$swimmingPool = new Parcel(100, 50, 3.5, 2000);
$realisticSwimmingPool = new Parcel(.5,.5,.1, 4);

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
    <h1>Your parcel</h1>
    <ul>
        <?php
        if($_GET["length"] > 0  && $_GET["width"]> 0 && $_GET["height"] > 0 && $_GET["weight"] > 0){
            $parcel = new Parcel($_GET["length"], $_GET["width"], $_GET["height"], $_GET["weight"]);
            $length = $parcel->getLength();
            $width = $parcel->getWidth();
            $height = $parcel->getHeight();
            $volume = $parcel->volume();
            $weight = $parcel->getWeight();
            $cost = $parcel->costToShip();

            if ($length > 4 ) {
                echo "<p>Your parcel is too long</p>";
            } else if ($width > 4){
                echo "<p>Your parcel is too wide</p>";
            } else if ($height > 4){
                echo "<p>Your parcel is too tall</p>";
            } else if ($weight > 20){
                echo "<p>Your parcel is too heavy</p>";
            } else {
              echo "<p>Your parcel is $volume^3m</p>";
              echo "<p>Your parcel weighs $weight kilos.</p>";
              echo "<p>Your parcel will cost $cost Euros to ship.</p>";
            }
        } else {
          echo "<p>Your parcel is lacking some fundamental quality of physical matter and thus is incompatible with our shipping services.</p>";
        }
        ?>
    </ul>
</body>
</html>
