<?php

  require_once ("./Property.php");
  require_once ("./dbOperation.php");
  require_once ("./utility.php");

  use PHPTestException\Property;

  $imagePath = myUploadFile($_FILES);

  $property = new Property(
      -1,
   	  $_POST["town"],
      $_POST["description"],
      $_POST["address"],
      $imagePath,
      $_POST["numBedrooms"],
      $_POST["price"],
      $_POST["propertyType"],
   	  1);

  insertProperty($property);
  
  echo "<script>location.replace(\"./index.php\")</script>";
