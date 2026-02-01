<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$scriptName = basename($_SERVER['SCRIPT_NAME']);
$projectName = explode('/', $_SERVER['SCRIPT_NAME'])[1];

echo "Project Name: " . $projectName . "<br>";
echo "Script Name: " . $scriptName;
?>
</body>
</html>