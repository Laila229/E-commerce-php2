<?php
$conn = mysqli_connect('localhost' , 'root' , '' ,'myopject');

if(!$conn){
    die('error' . mysqli_connect_error());
}
else{
    echo "connect ";
}
?>