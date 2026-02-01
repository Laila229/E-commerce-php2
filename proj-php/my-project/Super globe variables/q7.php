<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
session_start();

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

$_SESSION['counter']++;
?>


<h2>Website Refresh Counter</h2>

<p>Page visited: <?php echo $_SESSION['counter']; ?> times</p>

<p>Refresh the page to increase the counter.</p>


</body>
</html>