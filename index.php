<?php

class Database {
    private $host = "localhost:3306";
    private $username = "root";
    private $password = "";
    private $database = "crudoops";

    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}

class User extends Database {
    // Create
    public function createUser($username, $email) {
        $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
        $this->conn->query($sql);
    }

    // Read
    public function getUsers() {
        $result = $this->conn->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Update
    public function updateUser($id, $username, $email) {
        $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";
        $this->conn->query($sql);
    }

    // Delete
    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id=$id";
        $this->conn->query($sql);
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userDatabase = new User();

    // Create
    if (isset($_POST["create"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $userDatabase->createUser($username, $email);
    }

    // Update
    elseif (isset($_POST["update"])) {
        $id = $_POST["id"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $userDatabase->updateUser($id, $username, $email);
    }

    // Delete
    elseif (isset($_POST["delete"])) {
        $id = $_POST["id"];
        $userDatabase->deleteUser($id);
    }
}

// Read
$userDatabase = new User();
$users = $userDatabase->getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
</head>
<body>

<h2>User List</h2>
<ul>
    <?php foreach ($users as $user) : ?>
        <li><?= $user["username"] ?> (<?= $user["email"] ?>)</li>
    <?php endforeach; ?>
</ul>

<h2>Create User</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <button type="submit" name="create">Create</button>
</form>

<h2>Update User</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="id">User ID:</label>
    <input type="number" name="id" required>
    <label for="username">New Username:</label>
    <input type="text" name="username" required>
    <label for="email">New Email:</label>
    <input type="email" name="email" required>
    <button type="submit" name="update">Update</button>
</form>

<h2>Delete User</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="id">User ID:</label>
    <input type="number" name="id" required>
    <button type="submit" name="delete">Delete</button>
</form>

</body>
</html>
