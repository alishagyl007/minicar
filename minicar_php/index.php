<?php
    include 'classes/Manufacturer.php';
    $manufacturer = new Manufacturer(); //creating constrtuctor of class Manufacturer 
    $message="";
    $fetchresult = $manufacturer->fetchManufacturers("manufacturer");
    
    if(isset($_POST["submit"])){
        $arrayDataToInsert = array
        (
            "manufact_name"=> $_POST['manufact_name'],
            "status"=>1
        );
        
        if($manufacturer->insertIntoManufacturer("manufacturer", $arrayDataToInsert)){
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
      <div class="page-title"><a href="#">Add Manufacturer</a></div>
  <!-- PAGE TITLE END -->

  <!-- CONTENT BOLOG -->
      <div class="content-panel">
        <p class="heading-dec">Welcome to the mini car inventory software system</p>
        <form method="post">
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Manufacturer Name" name="manufact_name">
            </div>
            <div class="button-blog">
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
        <?php
            if(isset($message))
            {
                echo $message;
            }
        ?>
        
            
        <p class="heading-dec">Below is the active manufacturers</p>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>Serial Number</th>
              <th>Manufacturer Name</th>
              <th>Button</th>
            </tr>
          </thead>
          <tbody>
            
                <?php
                foreach($fetchresult as $res){
                    echo "<tr>";
                echo "<td>".$res['id']. "</td>";
                echo "<td>".$res['manufact_name']. "</td>";
                
              ?>
                
                
              <td><a href='#' class='btn btn-default waves-effect waves-float waves-green'><i class='material-icons'>edit</i></a>
                                          </td>
                <?php 
                
                }
              echo "</tr>";
              ?>
            
            
          </tbody>
        </table>
      </div>
        
      
  <!-- END SECTION  -->

    <!-- PAGE TITLE -->
      <div class="page-title-right"><a href="add_model.php">NEXT</a></div>
  <!-- PAGE TITLE END -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>