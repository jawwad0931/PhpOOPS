<?php
// ye aik class hai jahan database ke member stores hain
class Database {
    // yahan database ke values ko variable mai store kiya jaa raha hai
    private $host = "localhost:3306";
    private $username = "root";
    private $password = "";
    private $database = "crudoops";
    // $conn aik variable create kiya hai jo ke protect type ka hoga aur isme database ke data ko store kiya jayega
    protected $conn;

    // yahan Connection check kiya jaa raha hai ke connect hua hai ya nahi aur ye aik constructor hai
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }else{
            echo '<script>alert("Connection Successfull");</script>';
        }
    }

    // ye destructor function hai yahan connection close ho jayega
    public function __destruct() {
        $this->conn->close();
    }
}
?>
