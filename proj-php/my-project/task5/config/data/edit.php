<?php
require_once '../config/database.php';

if (isset($_POST['submit'])) {
    // Sanitize input
    $name = htmlspecialchars(trim($_POST['name']));
    $address = htmlspecialchars(trim($_POST['address']));
    $salary = htmlspecialchars(trim($_POST['salary']));
    $id = htmlspecialchars(trim($_POST['id']));

    // Basic validation
    if (!empty($name) && !empty($address) && !empty($salary)) {
        $sql = "UPDATE users SET name = ?, address = ?, salary =?  WHERE id = ?";
        $db->query($sql, [$name, $address, $salary, $id]);

        header("Location: ../index.php");
    }
}