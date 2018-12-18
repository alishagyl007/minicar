<?php
//include 'classes/Manufacturer.php';
include 'classes/Model.php';
$obj_model = new Model(); //creating constrtuctor of class Manufacturer
$fetchresult = $obj_model->fetch_model("manufacturer");
//print_r($fetchresult);

if(isset($_POST["btn_submit"])){
        $arrayDataToInsert = array
        (
            "model_name"=> $_POST['model_name'],
            "manufacturer_id"=> $_POST['manufact'],
            "count"=> $_POST['count'],
            "status"=>1
        );
        
        if($obj_model->insert_into_model("model", $arrayDataToInsert)){
            $message="Succcessfully Added";        
        }
        else
        {
            $message="something went wrong";
        }
        
        
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>:: Alisha ::</title>
  </head>
  <body>
  
  <!-- PAGE TITLE -->
      <div class="page-title"><a href="#">Add Model</a></div>
  <!-- PAGE TITLE END -->

  <!-- CONTENT BOLOG -->
      <div class="content-panel">
        <p class="heading-dec">Add Models Available here</p>
        <form  method="post">
          <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label>Model name:</label>
              <input class="form-control" type="text" name="model_name" placeholder="Model Name">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
                <label>Count:</label>
              <input class="form-control" type="text" name="count" placeholder="Total">
            </div>
          </div>
          <div class="col-sm-6">
            
              <div class="form-group">
                            <label>Manufacturer List:</label>
                        <select class="form-control" name="manufact">
                <?php
                                
                                foreach($fetchresult as $ref){
                                        echo "<option value='".$ref['id']."'>".$ref['manufact_name']."</option>";
                                }
                                ?>
                        </select>
              </div>
            </div>
          </div>
          <div class="button-blog">
              <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button>
            </div>
          </div>
            
        </form>
        <?php
            if(isset($message))
            {
                echo $message;
            }
        ?>
      </div>
  <!-- END SECTION  -->

    <!-- PAGE TITLE -->
      <div class="page-title-right"><a href="show_inventory.php">NEXT</a></div>
  <!-- PAGE TITLE END -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>