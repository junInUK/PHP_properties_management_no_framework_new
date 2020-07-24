<?php
  namespace PHPTestException;

  require_once ("./dbOperation.php");
  require_once ("./utility.php");

  $properties = getAllPropertiesFromDB();

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
          <div class="card-header">
            Properties
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <td>Images</td>
                <td>Address</td>
                <td></td>
                <td></td>
              </thead>
              <tbody>
              <?php foreach ($properties as $property){ ?>
                <tr>
                  <td>
                    <?php
                      myLog($property->get_id());
                      myLog($property->get_address());
                      myLog($property->get_imageFull());
                    ?>
                    <img src="
                    <?php 
                      echo $property->get_imageFull();
                    ?>
                    " width="60px" height="60px">
                  </td>
                  <td><?php echo $property->get_address(); ?>
                  </td>
                  <td>
                    <a href="viewProperty.php?id=<?php echo $property->get_id(); ?>" class="btn btn-info btn-sm">View</a>
                  </td>
                  <td>
                    <form action="deleteProperty.php" method="POST">
                      <input type="hidden" name="id" value="<?php echo $property->get_id() ?>"  id="id"/>
                      <button type="submit" class="btn btn-danger btn-sm">
                        Del
                      </button>
                    </form>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>   
          </div>  <!--  end of <div class="card-body">-->
        </div>  <!--  end of <div class="card card-default">  -->
      </div>  <!--  end of <div class="col-md-8" -->

    </div>  <!--  end of <div class="row">  -->
  </div>  <!--  end of <div class="container">  -->

  <script>
    $("#nav").load("nav.html");
  </script>

</body>
