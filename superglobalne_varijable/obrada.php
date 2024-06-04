<?php

$postData = !empty($_POST);
if($postData) {
    $error = 0;
    if(empty($_POST['first_name'])){
        echo "Ime je obavezna stavka.<br>";
        $error = 1;
    }
    if(empty($_POST['last_name'])){
        echo "Prezime je obavezna stavka.<br>";
        $error = 1;
    }
    if($error == 0) {
        echo ("Poslano ime je: " . $_POST['first_name'] . "<br>Poslano prezime je: " . $_POST['last_name']);
    }
}
else echo "Niste kliknuli na pošalji";

?>