<?php
session_start();
echo "wlecom<br>".$_SESSION['role'];
echo "<br><br>";
?>

<a href="logout.php">LOG OUT</a>