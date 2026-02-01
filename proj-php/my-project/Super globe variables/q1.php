<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    email: <input type="text" name="email"><br><br>
    password: <input type="password" name="password"><br><br>
    <input type="submit" value="Submit">
    </form>

<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $email=$_POST['email'];
 $password=$_POST['password'];

 echo "YOUR EMAIL IS  " . $email ."<br>" ;
 echo "YOUR PASSWORD IS  " . $password ."<br>"; 

 }


?>


</body>
</html>