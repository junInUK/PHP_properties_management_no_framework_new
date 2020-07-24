<?php
require_once ("./Property.php");
require_once ("./dbOperation.php");
require_once ("./utility.php");

use PHPTestException\Property;

if( "" == $_FILES["image"]["name"]) {
  $imagePath = $_POST["oldImageSrc"];
} else {
  $imagePath = myUploadFile($_FILES);
}

echo "id:".$_POST["id"]."<br/>";
echo "town:".$_POST["town"]."<br/>";
echo "description:".$_POST["description"]."<br/>";
echo "address:".$_POST["address"]."<br/>";
echo "imagePath:".$imagePath."<br/>";
echo "number of bedroom:".$_POST["numBedrooms"]."<br/>";
echo "price:".$_POST["price"]."<br/>";
echo "property type:".$_POST["propertyType"]."<br/>";

$property = new Property(
    $_POST["id"],
    $_POST["town"],
    $_POST["description"],
    $_POST["address"],
    $imagePath,
    $_POST["numBedrooms"],
    $_POST["price"],
    $_POST["propertyType"],
    1);

updateProperty($property);

echo "<script>location.replace(\"./index.php\")</script>";
