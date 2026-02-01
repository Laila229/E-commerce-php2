<?php
session_start();
echo "welcome ".$_SESSION['role'];
echo "<br>";
?>
<a href="logout.php">Logout</a>