<?php
//vjezba 1: deklaracija funkcije, vraćanje teksta i pridruživanje varijabli te ispis
function povratTeksta() : string {
    return "Uspješno vraćen tekst";
}

$ispis = povratTeksta();

echo $ispis;
echo "<br>";
//vjezba 2: deklaracija funkcije s 2 argumenta, konkatenacija i pretvaranje u velika slova, pozivanje funkcije i ispis varijable

function manipulacijaStringa(string $name , string $surname) : string {
    $spojeno = "$name" . " " . "$surname";
    return $veliko = mb_strtoupper($spojeno);
}

$ispis2 = manipulacijaStringa("Dennis" , "Jandrić");

echo $ispis2;
echo "<br>";

//vjezba 3: 

function zbrojArgumenata(int $number) : int {
    static $sum = 0;
    $sum += $number;
    return $sum;
}

$funk = 'zbrojArgumenata';

for($i=0;$i<5;$i++) {
    $arg = mt_rand(1,10);
    $rezultat = $funk($arg);
    echo $rezultat . "<br>";
}