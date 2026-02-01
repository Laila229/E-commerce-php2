<?php
require 'database.php';

$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>

<h2>Users List</h2>

<a href="create.php">+ Create User</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= htmlspecialchars($user['name']) ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td>
            <a href="edit.php?id=<?= $user['id'] ?>"> Edit</a>
            |
            <a href="delete.php?id=<?= $user['id'] ?>" 
               onclick="return confirm('Are you sure?')"> Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
