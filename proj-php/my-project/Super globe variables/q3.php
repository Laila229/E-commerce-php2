<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    number1: <input type="text" name="number1"><br><br>
    operation: <input type="text" name="operation"><br><br>
    number2: <input type="text" name="number2"><br><br>
    <input type="submit" value="Calculate">
    </form>

    <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $num1=$_POST['number1'];
 $op=$_POST['operation'];
 $num2=$_POST['number2'];

 if($op=='+'){
    echo "<br>"."The result is ".$num1+$num2 ;
 }
 else  if ($op=='-'){
    echo "<br>"."The result is ".$num1-$num2 ;
 }
  else  if ($op=='*'){
    echo "<br>"."The result is ".$num1*$num2 ;
 }
 else
     echo "<br>"."The result is ".$num1/$num2 ;
 
 }

 ?>

 

</body>
</html>