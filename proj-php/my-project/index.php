<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <h1>Hello</h1> -->
    <?php


    //---------------------Task1--------------------//
    $salary=[
        ["Salary of Mr.A is","1000$"],
        ["Salary of Mr.B is","1200$"],
        ["Salary of Mr.C is","1400$"]
    ];
    echo "<table border=1>";
    echo "<tr><td>{$salary[0][0]}</td><td>{$salary[0][1]}</td></tr>";
    echo "<tr><td>{$salary[1][0]}</td><td>{$salary[1][1]}</td></tr>";
    echo "<tr><td>{$salary[2][0]}</td><td>{$salary[2][1]}</td></tr>";
    echo "</table>";
    $fileName="index.php";
    $filetime=filemtime($fileName);
    $formatDate=date("l, js F, Y,h:ia",$filetime);
    echo "Last modified is {$formatDate}<br>";
     $lines=file($fileName);
     $lineCount= count($lines);
     echo"The file {$fileName} number of line is {$lineCount}<br>";

     //--------------Task2-------------------------//
     //(1)
     $color=["red","green","white"];
     echo "The memory of that scene for me is like a frame of film forever frozen at that moment: the {$color[0]} carpet, the {$color[1]} lawn, the {$color[2]} house, the leaden sky. The new president and his first lady.<br>";
     echo "<ul>
     <li>{$color[1]}</li>
     <li>{$color[0]}</li>
     <li>{$color[2]}</li>
     </ul> <br>";

     //(2)
      $cities= array( "Italy"=>"Rome",
     "Luxembourg"=>"Luxembourg",
     "Belgium"=> "Brussels", 
     "Denmark"=>"Copenhagen",
     "Finland"=>"Helsinki", 
     "France" => "Paris", 
     "Slovakia"=>"Bratislava", 
     "Slovenia"=>"Ljubljana",
     "Germany" => "Berlin", 
     "Greece" => "Athens",
     "Ireland"=>"Dublin",
     "Netherlands"=>"Amsterdam", 
     "Portugal"=>"Lisbon",
     "Spain"=>"Madrid");

foreach($cities as $country => $capital){
    echo "The Capital of {$country} is {$capital}<br>";
}

//(3)
$color2=array(
    4 =>"white",
    6 => "Green",
    11 => "red"
);
echo $color2[4],"<br>";

//(4)
$arrayNumber =[1,2,3,4,5];
$insert ="$";
array_splice ($arrayNumber, 3,0,$insert);
print_r($arrayNumber);
echo "<br>";

//(5)
$fruits = array("d" => "lemon",
 "a" => "orange",
 "b" => "banana", 
 "c" => "apple");
sort($fruits);
print_r($fruits);
echo "<br>";

//(6)
//-----sum-------//
$temperatures=[78, 60, 62, 68, 71, 68,
 73, 85, 66, 64, 76, 63, 75,
  76, 73, 68, 62, 73, 72, 65,
   74, 62, 62, 65, 64, 68, 73,
    75, 79, 73];

$sum = 0;
$count = 0;

for ($i = 0; $i<count($temperatures); $i++) {
    $sum += $temperatures[$i];
    $count++;
}
//-----average------//
$average = $sum / $count;
echo "Average Temperature is: {$average}<br>";
for ($i = 0; $i < $count - 1; $i++) {
    for ($j = 0; $j < $count - $i - 1; $j++) {
        if ($temperatures[$j] > $temperatures[$j + 1]) {
            $temp = $temperatures[$j];
            $temperatures[$j] = $temperatures[$j + 1];
            $temperatures[$j + 1] = $temp;
        }
    }
}
//------lowest------//
echo "List of five lowest temperatures: ";
for ($i = 0; $i < 5; $i++) {
    echo "{$temperatures[$i]} ,";
}
echo "<br>";
//----highest-----//
echo "List of five highest temperatures: ";
for ($i = $count - 5; $i < $count; $i++) {
    echo $temperatures[$i] . ", ";
}
echo "<br>";

//(7)
$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$Merge=array_merge($array1,$array2);
print_r($Merge);
echo "<br>";

//(8)
$colors = array("red","blue", "white","yellow");
$upper= array_map("strtoupper",$color);
print_r($upper);
echo "<br>";

//(9)
for($i=200; $i<250;$i++){
    if($i%4==0){
        echo " {$i} ,";
    }
}
echo "<br>";


//(10)
$words = array("abcd","abc","de","hjjj","g","wer");

$shortest =100;
$longest = 0;


for ($i = 0; $i < count($words); $i++) {


    $length = strlen($words[$i]);

    if ($length < $shortest) {
        $shortest = $length;
    }

 
    if ($length > $longest) {
        $longest = $length;
    }
}

echo "The shortest array length is $shortest.";
echo "The longest array length is $longest.<br>";

//(11)
$array1 = array( 2, 0, 10, 12, 6);
$short=100;

foreach ($array1 as $num) {
    if ($num != 0 && $num < $short) {
        $short = $num;
    }
}

echo "the lowest integer = {$short}<br>";
//-----------------------------string----------------------//
//(1)
$string = "Laila adel assad";

// a. Uppercase
echo strtoupper($string) . "<br>";

// b. Lowercase
echo strtolower($string) . "<br>";

// c. First letter uppercase
echo ucfirst($string) . "<br>";

// d. First letter of each word uppercase
echo ucwords($string);

//(2)
$num = "085119";
echo substr($num,0,2).":".substr($num,2,2).":".substr($num,4,2);

//(3)
$sentence = "I am a full stack developer at orange coding academy";
$word = "Orange";

if (stripos($sentence, $word) !== false) {
    echo "Word Found!";
} else {
    echo "Word Not Found!";
}

//(4)
$url = "www.orange.com/index.php";
echo basename($url);

//(5)
$email = "info@orange.com";
echo strstr($email, "@", true);

//(6)
$string = "info@orange.com";
echo substr($string, -3);

//(7)
$chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
$password = str_shuffle($chars);
echo substr($password, 0, 8);

//(8)
$string = "That new trainee is so genius.";
$newWord = "Our";

echo preg_replace('/^\w+/', $newWord, $string);

//(9)
$str1 = "dragonball";
$str2 = "dragonboll";

for ($i = 0; $i < strlen($str1); $i++) {
    if ($str1[$i] !== $str2[$i]) {
        echo "First difference at position $i: \"$str1[$i]\" vs \"$str2[$i]\"";
        break;
    }
}

//(10)
$string = "Twinkle, twinkle, little star.";
$array = explode(",", $string);
var_dump($array);

//(11)
$char = 'z';
echo ($char == 'z') ? 'a' : chr(ord($char) + 1);

//(12)
$string = "The brown fox";
echo str_replace("The", "The quick", $string);

//(13)
$num = "0000657022.24";
echo ltrim($num, '0');

//(14)
$string = "The quick brown fox jumps over the lazy dog";
echo str_replace("fox ", "", $string);

//(15)
$string = "The quick brown fox jumps over the lazy dog---";
echo rtrim($string, "-");

//(16)
$string = '\"\1+2/3*2:2-3/4*3';
echo preg_replace('/[^0-9 ]/', ' ', $string);

//(17)
$string = "The quick brown fox jumps over the lazy dog";
$words = explode(" ", $string);
echo implode(" ", array_slice($words, 0, 5));

//(18)
$num = "2,543.12";
echo str_replace(",", "", $num);

//(19)
for ($c = 'a'; $c <= 'z'; $c++) {
    echo $c . " ";
}

//----------------------------Loop-------------------------//

//(1)
for($i=1;$i<=10;$i++){
    echo "{$i}";
    if($i<10){
        echo "-";
    }
}
echo "<br>";
//(2)
$sum=0;
for($i=0;$i<=30;$i++){
    $sum+=$i;
}
echo "total as a number= {$sum}<br>";

//(3)
$letters = ["A", "B", "C", "D", "E"];

for ($row = 0; $row < 5; $row++) {

    for ($col = 0; $col < 5; $col++) {

        if ($col < 4 - $row) {
            // اطبع الحرف الأول لكل صف
            echo $letters[0] . " ";
        } else {
            // اطبع حرف الصف الحالي
            echo $letters[$row] . " ";
        }
    }

    echo "<br>";
}

//(4)

//(5)


//(6)
$num=5;
$sum=1;
for($i=1;$i<=$num;$i++){
    $sum*=$i;
}
echo "The factorial of a number is {$sum}<br>";

//(7)
/*-----------Logical Statements and Operators------------------*/

//(2)
$tempp=27;
if($tempp<20){
    echo "it is winter";
}else{
    echo "It is summertime!<br>";
}
//(3)

//(4)
$firstNum=10;
$secuondNum=10;
$sum=$firstNum+$secuondNum;
if($sum === 30){
    echo "true<br>";
}else{
    echo "false<br>";
}

//(5)
$number=30;
if($number>0 && $number%3 ===0){
    echo "true<br>";
}else{
    echo "false<br>";
}

//(6)
$value=50;
if($value>=20 && $value<=50){
    echo "true<br>";
}else{
    echo "false<br>";
}

//(7)
$value2=[1,5,9];
$max=$value2[0];
for($i=0;$i<count($value2);$i++){
    for($j=1;$j<count($value2);$j++){
        if($value2[$j]>$value2[$i]){
            $max=$value2[$j];
        }
    }
}
echo $max,"<br>";

//(8)
$unit=0;
if($unit<=50){

}
//---------------------------Functions-------------------------//
//(1)
function prime($num){
    if ($num <= 1){
        echo "the {$num} is not pirme";
    }elseif($num ==2 || $num ==3){
        echo "the {$num} is a prime";
    }elseif($num%$num==0 && $num%2!=0 && $num%3 !=0){
        echo "the {$num} is a prime";
    }else{
        echo "the {$num} is not pirme";
    }  
    }

prime(2);
echo "<br>";

//(2)
function reverse($str){ //echo strrev("remove"); // // function//
$reversed = "";
for ($i = strlen($str) - 1; $i >= 0; $i--) {
    $reversed .= $str[$i];
}
echo $reversed;
}
reverse("Remove");
echo "<br>";

//(3)  // if (ctype_lower($str)) { echo "Your String is Ok";
function lower($str){
$low=true;
    for($i=0;$i<strlen($str);$i++){
        if($str[$i] !== strtolower($str[$i])){
            $low=false;
            break;
        }
    }
if(!$low){
    echo "Your String is not all lower";
}else{
    echo "Your String is Ok";
}
}
lower("emoRve");
echo "<br>";

//(4)
function swap($num1,$num2){
echo "x= {$num1} , y= {$num2}<br>";
    $num3=$num1;
    $num1=$num2;
    $num2=$num3;
echo "x= {$num1} , y={$num2}";
}
swap(3,4);
echo "<br>";

//(5) the same task//

//(6)
//(7)

//(8)
function duplicates($array){
    for($i=0;$i<count($array);$i++){
        for($j=$i+1;$j<count($array);$j++){
            if($array[$i] === $array[$j]){
                // unset($array[$j]);
                // echo $array[$j];
                // $remove=[$array[$j]];
                array_splice($array, $j);
            }
        }
    }
    // unset($array[$remove[1] ]);
    // $array = array_values($array);
    print_r($array);
}
duplicates([2,4,5,4,3,2,1,5]);

?>

</body>
</html>