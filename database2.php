<?php  
    class db{
        public $dbHost = "localhost:3306";
        public $dbName = "root";
        public $dbPassword = "";
        public $dbDatabase = "crudoops";
        public $conn;


        public function __constructfunc(){
            $this->conn = new mysqli($this->dbHost,$this->dbName,$this->dbPassword,$this->dbDatabase);   
            if($this->conn->connect_error){
                echo '<script>alert("Error show");</script>';
                echo '<script>console.log($this->conn);</script>';
            }else{
                echo '<script>alert("Database Connect Successfully");</script>';
            }       
        }
        public function __destruct(){
            $this->conn->close();
        }
}
?>