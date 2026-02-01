<?php
require_once '../config/database.php';

if (isset($_POST['submit'])) {
    // Sanitize input
    $name = htmlspecialchars(trim($_POST['name']));
    $address = htmlspecialchars(trim($_POST['address']));
    $salary = htmlspecialchars(trim($_POST['salary']));

    // Basic validation
    if (!empty($name) && !empty($address) && !empty($salary)) {
        $db = DatabasePDO::getInstance();
        $sql = "INSERT INTO users (name, address , salary) VALUES (?, ? , ?)";
        $db->query($sql, [$name, $address, $salary]);

        header("Location: ../index.php");
        // echo "<p style='color:green;'>User created successfully!</p>";
    } else {
        echo "<p style='color:red;'>Please enter valid name and email.</p>";
    }
}