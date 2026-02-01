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

$sql = "SELECT orders.id,
               orders.total,
               orders.status,
               orders.phone,
               orders.governorate,
               orders.area,
               orders.street
               users.name AS users_name
        FROM orders
        JOIN users ON users.users_id = users.id";


$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Orders List</title>
</head>
<body>

<h2>Orders</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>User_name</th>
        <th>Total</th>
        <th>Status</th>
        <th>Phone</th>
        <th>governorate</th>
        <th>Area</th>
        <th>Street</th>
    </tr>

    <?php while ($row = $result): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['users_name'] ?></td>
        <td><?= $row['total'] ?></td>
        <td><?= $row['status'] ?></td>
        <td><?= $row['phone'] ?></td>
        <td><?= $row['governorate'] ?></td>
        <td><?= $row['area'] ?></td>
        <td><?= $row['street'] ?></td>
        <td>
            <a href="orders_list.php?delete_id=<?= $row['id'] ?>"
               onclick="return confirm('Are you sure?')">
               Delete
            </a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>

</body>
</html>