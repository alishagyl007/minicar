<?php 

class Database {
    
    public $mysqli;
    public $host, $username, $password, $database;

    /**
     * Creates the mysql connection.
     * Kills the script on connection or database errors.
     * 
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $database
     * @return boolean
     */
     
    public function connect(){
        $this->host        = "localhost";
        $this->username    = "root";
        $this->password    = "pass";
        $this->database    = "minicar";

        $conn = new mysqli($this->host, $this->username, $this->password , $this->database)
            OR die("There was a problem connecting to the database.");
        $this->mysqli = $conn;
        
        
        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        $this->mysqli->select_db($this->database);

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        return $conn;
    }

    /**
     * Prints the currently selected database.
     */
    public function print_database_name()
    {
        /* return name of current default database */
        if ($result = $this->mysqli->query("SELECT DATABASE()")) {
            $row = $result->fetch_row();
            echo "Selected database is \n", $row[0];
            $result->close();
        }
    }

  
}

?>