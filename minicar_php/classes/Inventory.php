<?php
require 'Database.php';
   // $db = new Database();

class Inventory extends Database{
    public function __construct(){
        
    }
public function fetch_model($tablename){
        $array = array();
        $sql_string_fetch = "SELECT a.model_name, b.manufact_name, a.count FROM $tablename a, manufacturer b WHERE a.manufacturer_id=b.id AND a.status='1'";
        //$result = $this->connect()->query($sql_string_fetch);
        
        $result = mysqli_query($this->connect(), $sql_string_fetch);
        
        
        while($row= mysqli_fetch_assoc($result)){
            $array[] = $row;
        }
        return $array;
    }
    
    
}
?>