<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // $name="laila";
    // $age=22;
    // $country="amman";
    // echo "welcome to my website, i'm $name, i'm $age, form $country <br>";
    // $arr=["abd","laila","asaad"];
    // print_r($arr);
    // echo "$arr[0]  ";
    //  echo "$arr[1]  ";
    //  echo "$arr[2]","<br>";
    //  $number=50;
    //  if($number>18 && $number<60){
    //     echo "welcome <br>";
    //  }else{
    //     echo "hello <br>";
    //  }
    //  $isEditor=true;
    //  $isAdmin=true;
    //  if($isAdmin || !$isEditor){
    //     echo "Admin page <br>";
    //  }else{
    //     echo "Editore page";
    //  }
    //  $user = [
    //     "name" => "laila",
    //     "age" => 22,
    //     "country" => "Amman"
    //  ];
    //  echo $user["name"],"<br>";

    //  $useri = [
    //     ["laila","22","Amman"],
    //     ["abd","26","Irbid"],
    //     ["aisha","23","zarqa"]
    //  ];
    // //  echo $useri[1][2]"<br>" ;
    //  $fullName= "Laila Adel Asaad Al-bazlamit";
    //  echo strlen($fullName),"<br>";
    //  echo strpos($fullName,"Laila"),"<br>";
    //  echo substr($fullName,0,5),"<br>";
    //  echo strtoupper($fullName),"<br>"
    $num=4;
    if($num>0){
        echo "the number is positive <br>";
    }elseif($num<0){
        echo "the number is negative <br>";
    }else{
        echo "the number is zero <br>";
    }


    for($i=0; $i<20;$i++){
if($i%2==0){
    echo $i ,"<br>";
    
}
    }

$movies=["Action","Drama","comedy","horror"];
foreach($movies as $row)
echo $row ,"<br>";

switch($i<10){

}

echo "<br><br><br>";

$dom = new DOMDocument();
$dom ->loadHTMLFile("page.html");
$li= $dom ->getElementsByTagName('li');

foreach($li as $item){
    echo $item->nodeValue."<br>";
}
$newHeading=$dom->createElement("p","Dynamic paragraph");
$dom->getElementsByTagName("body")[0]->appendChild($newHeading);

$secondLi= $dom->getElementsByTagName('li')[1];
$secondLi->parentNode->removeChild($secondLi);
echo $dom->saveHTML();
    ?>
</body>
</html>