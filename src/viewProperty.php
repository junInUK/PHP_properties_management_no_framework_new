<?php
  require_once ("./dbOperation.php");

  $id = $_GET['id'];
  $property = getPropertyFromDB($id);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Property Management</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
<body>
  <div class="container">
    <div class="row">

      <div id="nav" class="col-md-4"></div>

      <div class="col-md-8">
        <div class="card card-default">
          <div class="card-header">Property</div>
          <div class="card-body">
            <form action="updateProperty.php" enctype="multipart/form-data" onsubmit="return validateForm()" method="POST" name="updateProperty">

              <input type="hidden" name="id" value="<?php echo $id; ?>" id="id"/>

              <div class="form-group">
                <label for="town">Town:</label>
                <input type="text" class="form-control" name="town" value="<?php echo $property->get_town(); ?>" id="town"/>
              </div>

              <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" cols="5" rows="5" class="form-control">
                  <?php echo $property->get_desc(); ?>
                </textarea>
              </div>

              <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" value="<?php echo $property->get_address(); ?>" id="address"/>
              </div>

              <div class="form-group">
                <label for="image">Image:</label>
                <img src="<?php echo $property->get_imageFull(); ?>" style="width: 100%">
                <input type="file" class="form-control" name="image" id="image">
                <input type="hidden" name="oldImageSrc" value="<?php echo $property->get_imageFull() ?>" id="oldImageSrc" />
              </div>

              <div class="form-group">
                <label for="numBedrooms">Number of BedRooms:</label>
                <input type="number" class="form-control" name="numBedrooms" value="<?php echo $property->get_numBedrooms(); ?>" id="numBedrooms"/>
              </div>

              <div class="form-group">
                <label for="price">Price:</label>
                <input type="price" class="form-control" name="price" value="<?php echo $property->get_price(); ?>" id="price"/>
              </div>

              <div class="form-group">
                <label for="propertyType">Property Type:</label>
                <input type="number" class="form-control" name="propertyType" value="<?php echo $property->get_propertyType(); ?>" id="propertyType"/>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success">
                  Update
                </button>
              </div>

            </form>

          </div>  <!--  end of <div class="card-body">  -->
        </div>  <!--  end of <div class="card card-default">  -->
      </div>  <!--  end of <div class="col-md-8"> -->

    </div>  <!--  end of <div class="row">  -->
  </div>  <!--  end of <div class="container">  -->

  <script>

    $("#nav").load("nav.html");

    function validateForm() {
      let county        = document.forms["updateProperty"]["county"].value;
      let jcounty       = $.trim(county);
      let country       = document.forms["updateProperty"]["country"].value;
      let jcountry      = $.trim(country);
      let town          = document.forms["updateProperty"]["town"].value;
      let jtown         = $.trim(town);
      let description   = document.forms["updateProperty"]["description"].value;
      let jdescription  = $.trim(description);
      let address       = document.forms["updateProperty"]["address"].value;
      let jaddress      = $.trim(address);
      //let image         = document.forms["updateProperty"]["image"].value;
      let numBedrooms   = document.forms["updateProperty"]["numBedrooms"].value;
      let numBathrooms  = document.forms["updateProperty"]["numBathrooms"].value;
      let price         = document.forms["updateProperty"]["price"].value;
      let propertyType  = document.forms["updateProperty"]["propertyType"].value;
      //
      if ( "" == jcounty ){
        alert("County must be filled out.");
        return false;
      }
      if( "" == jcountry ){
        alert("Country must be filled out.");
        return false;
      }
      if( "" == jtown ){
        alert("Town must be filled out.");
        return false;
      }
      if( "" == jdescription ){
        alert("Description must be filled out.");
        return false;
      }
      if( "" == jaddress ){
        alert("Address must be filled out.");
        return false;
      }
      // // if( "" == image ){
      // //   alert("Image must been chosen.");
      // //   return false;
      // // }
      if( "" == numBedrooms || numBedrooms < 0){
        alert("Number of bedrooms must be great than zero or equal to zero.");
        return false;
      }
      if( "" == numBathrooms || numBathrooms < 0){
        alert("Number of bathrooms must be great than zero or equal to zero.");
        return false;
      }
      if( "" == price || price < 0){
        alert("Price must be great than zero or equal to zero.");
        return false;
      }
    }
  </script>

</body>
