<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php



$cookie_name = "user";
$cookie_value = "laila";


$expiry_time = time() + 3600;

// Path: "/" means available in entire domain
$cookie_path = "/";

// 
$domain = ""; 

// 
$secure = false;

// HttpOnly: true means cookie cannot be accessed by JavaScript
$httponly = true;


setcookie($cookie_name, $cookie_value, $expiry_time, $cookie_path, $domain, $secure, $httponly);

echo "Cookie '$cookie_name' has been set.<br>";
?>

</body>
</html>