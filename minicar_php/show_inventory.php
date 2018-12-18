<?php
    include 'classes/Inventory.php';
        $obj_inventory = new Inventory(); //creating constrtuctor of class Manufacturer 
    $message="";
    $fetchresult = $obj_inventory->fetch_model("model");
    print_r($fetchresult);
    
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
        <p class="heading-dec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>Manufacturer Name</th>
              <th>Model Name</th>
              <th>Count</th>
              <th>Sold Button</th>
            </tr>
          </thead>
          <tbody>
             <?php
                foreach($fetchresult as $res){
                    echo "<tr>";
                echo "<td>".$res['model_name']. "</td>";
                echo "<td>".$res['manufact_name']. "</td>";
                echo "<td>".$res['count']. "</td>";
              ?>
                
                
              <td><a href="action.php?tablename=model&id=<?php echo $res['id']; ?>" class='deletetopic btn btn-default waves-effect waves-float waves-green'><button>SOLD</button></a>
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
      <div class="page-title-right"><a href="#">NEXT</a></div>
  <!-- PAGE TITLE END -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script>

        $(".deletetopic").click(function(){
            $(this).parent().parent().fadeOut();
            $.ajax({
                type: "POST",
                url: $(this).attr('href'),
                data: "123",
                success: function(login){

                }
            });
            return false;
        });


    </script>
  </body>
</html>