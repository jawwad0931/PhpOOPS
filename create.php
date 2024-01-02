<?php
require_once 'user.php';

// Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST) == "POST") {
    $userDatabase = new User();

    // Create
    if (isset($_POST["create"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $userDatabase->createUser($username, $email);
    }
}

// Read
// if (!isset($userDatabase)) {
//     $userDatabase = new User();
// }
// $users = $userDatabase->getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>

<!-- <h2>User List</h2>
<ul>
    <?php foreach ($users as $user) : ?>
        <li>
            <?= $user["username"] ?> (<?= $user["email"] ?>)
        </li>
    <?php endforeach; ?>
</ul> -->

<h2>Create User</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <button type="submit" name="create">Create</button>
</form>

</body>
</html>
