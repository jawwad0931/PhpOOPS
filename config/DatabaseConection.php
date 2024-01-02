<?php
class DatabaseConnection {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DBhost, DBuser, DBpassword, DBdatabase);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        
        echo "Database connected successfully"; // Optional message, you may remove this line if not needed
    }

    public function getConnection() {
        return $this->conn;
    }
}

// Usage example:
$database = new DatabaseConnection();
$conn = $database->getConnection();
// Now, $conn holds the database connection.
?>
