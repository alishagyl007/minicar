<?php

require 'Database.php';
   // $db = new Database();

class Model extends Database{
    public function __construct(){
        
    }
    
    public function insert_into_model($tablename, $data){
        $sql_string = "INSERT INTO ".$tablename. "(";
        $sql_string .= implode(",", array_keys($data)) . ') VALUES (';
        $sql_string .= "'" .implode("','" , array_values($data)). "')";
        echo $sql_string;
        
         if ($this->connect()->query($sql_string)) 
        {
            //echo "New record created successfully";
            return true;
        } 
        else 
        {
            //echo "Error: " . $sql . "<br>" . mysqli_connect_error();
            return false;
        }
    }
    
    public function fetch_model($tablename){
        $array = array();
        $sql_string_fetch = "SELECT * FROM $tablename where status='1'";
        //$result = $this->connect()->query($sql_string_fetch);
        
        $result = mysqli_query($this->connect(), $sql_string_fetch);
        
        
        while($row= mysqli_fetch_assoc($result)){
            $array[] = $row;
            //echo $row['manufact_name'];
        }
        return $array;
    }
    
    
}


?>
