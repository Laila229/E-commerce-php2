<?php
require_once '../config/database.php';

if (!isset($_POST['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_POST['id'];

$sql = "DELETE FROM users WHERE id = ?";
$db->query($sql, [$id]);

header('Location: ../index.php');
exit;