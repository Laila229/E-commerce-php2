<?php

require_once "database.php";
$conn = Database::getInstance();


if (isset($_GET['delete_id'])) {

    $id = $_GET['delete_id'];

    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo "Product deleted successfully<br><br>";
}

$sql = "SELECT products.id,
               products.name,
               products.description,
               products.price,
               products.discount_percent,
               categories.name AS category_name
        FROM products 
        JOIN categories ON products.category_id = categories.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products List</title>
</head>
<body>

<h2>Products</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Discount %</th>
        <th>Category</th>
        <th>Action</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['description'] ?></td>
        <td><?= $row['price'] ?></td>
        <td><?= $row['discount_percent'] ?></td>
        <td><?= $row['category_name'] ?></td>
        <td>
            <a href="products_list.php?delete_id=<?= $row['id'] ?>"
               onclick="return confirm('Are you sure?')">
               Delete
            </a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>

</body>
</html>
