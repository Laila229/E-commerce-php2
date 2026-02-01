<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Search Engine</title>
</head>
<body>

<h2>Mini Search Engine</h2>

<form method="POST">
    <input type="text" name="url" placeholder="Enter URL (example: google.com)">
    <button type="submit">GO</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $url = trim($_POST['url']);

    // If user didn't write http:// or https://, add it
  if (!preg_match("/^https?:\/\//", $url)) {
      $url = "https://" . $url;
    }

    // Redirect to the entered URL
    header("Location: $url");
    exit;
}
?>

</body>
</html>