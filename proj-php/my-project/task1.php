<?php
echo "PHP Version: " . phpversion();
echo "<br><br>";

// phpinfo();

echo "Tomorrow I'll learn PHP global variables.";
echo "<br>";
echo "This is a bad command: del c:\\*.*";
echo "<br><br>";


echo $_SERVER['REMOTE_ADDR'];
echo "<br><br>";

echo basename($_SERVER['PHP_SELF']);
echo "<br><br>";

$url = "https://www.w3schools.com/php/default.asp";

$parts = parse_url($url);

echo "Scheme : " . $parts['scheme'] . "<br>";
echo "Host : " . $parts['host'] . "<br>";
echo "Path : " . $parts['path'] . "<br>";
echo "<br><br>";

$string = "PHP Tutorial";

$firstChar = $string[0]; 
$rest = substr($string, 1);

echo "<span style='color:red;'>$firstChar</span>$rest";
echo "<br><br>";

$page=0;
if($page){
    header("Location: https://www.w3schools.com/");
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <form action="welcom.php" method="POST">
        Name: <input type="text" name="name">
        <input type="submit" value="submit">
    </form>
</body>
</html>