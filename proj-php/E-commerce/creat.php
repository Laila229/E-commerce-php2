
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>

<h2>Add New Product</h2>

<form method="POST" enctype="multipart/form-data">

    <input type="text" name="name" placeholder="Product Name" required><br><br>

    <textarea name="description" placeholder="Description"></textarea><br><br>

    <input type="number" name="price" placeholder="Price" required><br><br>

    <input type="number" name="discount" value="0"><br><br>

    <select name="category_id" required>
        <option value="">Select Category</option>
        <?php
        while ($cat = $categories->fetch_assoc()) {
            echo "<option value='{$cat['id']}'>{$cat['name']}</option>";
        }
        ?>
    </select><br><br>

    <input type="file" name="image" required><br><br>

    <button type="submit" name="save">Save</button>

</form>

</body>
</html>


<?php

require_once "database.php";
$conn = Database::getInstance();

$categories = $conn->query("SELECT * FROM categories");


if (isset($_POST['save'])) {


    $name        = $_POST['name'];
    $description = $_POST['description'];
    $price       = $_POST['price'];
    $discount    = $_POST['discount'];
    $category_id = $_POST['category_id'];


    $imageName = $_FILES['image']['name'];
    $imageTmp  = $_FILES['image']['tmp_name'];
    $imagePath = "uploads/" . $imageName;

    move_uploaded_file($imageTmp, $imagePath);


    $sql = "INSERT INTO products 
            (category_id, name, description, price, discount_percent, image)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);


    $stmt->bind_param(
        "issdis",
        $category_id,
        $name,
        $description,
        $price,
        $discount,
        $imagePath
    );


    $stmt->execute();

    echo "✅ Product added successfully";
}
?>


