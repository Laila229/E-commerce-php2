<?php
require 'database.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    die("User not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->execute([$name, $email, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form method="POST">
    Name: <br>
    <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br><br>

    Email: <br>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
