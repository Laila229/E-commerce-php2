<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$file = "counter.txt";

if (!file_exists($file)) {
    file_put_contents($file, 0);
}

$count = file_get_contents($file);
$count++;

file_put_contents($file, $count);
?>

<h2>Website Counter</h2>
<p>Total visits: <?php echo $count; ?></p>



</body>
</html>