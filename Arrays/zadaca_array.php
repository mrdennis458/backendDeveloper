<?php 

$primeNumbers = [2, 3, 5, 7, 11] ;
$statment = isset($primeNumbers[2]);
var_dump($statment);
echo "<br>";

if($statment) {
    echo $primeNumbers[2] ;
}
else {
    echo "Treći element u nizu ne postoji.";
}

array_push($primeNumbers, '13') ;

$numbersInArray = count($primeNumbers);
echo "<br>Ispisali smo " . $numbersInArray . " primarnih brojeva<br>";
print_r($primeNumbers);
echo "<br>";
rsort($primeNumbers);
print_r($primeNumbers);
