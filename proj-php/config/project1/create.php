<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->execute([$name, $email]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>

<h2>Create User</h2>

<form method="POST">
    Name: <br>
    <input type="text" name="name" required><br><br>

    Email: <br>
    <input type="email" name="email" required><br><br>

    <button type="submit">Save</button>
</form>

</body>
</html>
