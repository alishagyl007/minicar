<?php
require 'Database.php';
   // $db = new Database();
$id = mysql_real_escape_string($_REQUEST['id']);
$tablename = mysql_real_escape_string($_REQUEST['table']);
sold($tablename, $id);
class Inventory extends Database{
    public function __construct(){
    
        
    }
    
    public function sold($tablename,$id){
        $sql_fetch_count = "SELECT count from `$tablename` where id='".$id."'" ;
        $result = mysqli_query($this->connect(), $sql_fetch_count);
        while($num = mysqli_fetch_assoc($result)){
            $count = $num['count'];
            $newcount= $count-1;
            mysqli_query($this->connect(), "UPDATE `$tablename` SET count='".$newcount."' WHERE id='".$id."'");
            if($newcount==0){
                mysqli_query($this->connect(), "UPDATE `$tablename` SET status='0' WHERE id='".$id."'");
            }
        }
    }
}
?>