<?php
// ye database ki include file hai 
require_once 'database2.php';


// yahan user class banaya hai aur yahan hum database ki class ko inherit kar rahay hai with the help of extends keywords
class User2 extends db {
    // Create
    public function createUser($username, $email) {
        $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
        $this->conn->query($sql);
    }
    // Read
    // public function getUsers() {
    //     $result = $this->conn->query("SELECT * FROM users");
    //     return $result->fetch_all(MYSQLI_ASSOC);
    // }
    // Update
    // public function updateUser($id, $username, $email) {
    //     $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";
    //     $this->conn->query($sql);
    // }
    // Delete
    // public function deleteUser($id) {
    //     $sql = "DELETE FROM users WHERE id=$id";
    //     $this->conn->query($sql);
    // }
}
?>
