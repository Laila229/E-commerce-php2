<?php

require_once "database.php";
$conn = Database::getInstance();


if (isset($_GET['delete_id'])) {

    $id = $_GET['delete_id'];

    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo "user deleted successfully<br><br>";
}

$sql = "SELECT users.id,
               users.name,
               users.email,
               users.phone,
        FROM users";


$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>

<h2>User</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>phone</th>
        <th>Action</th>
    </tr>

    <?php while ($row = $result): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['phone'] ?></td>
        <td>
            <a href="user_list.php?delete_id=<?= $row['id'] ?>"
               onclick="return confirm('Are you sure?')">
               Delete
            </a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>

</body>
</html>