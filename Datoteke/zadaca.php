<?php

const FILE_PATH = __DIR__.'/Podaci/polaznici.json';

function jsonToArray (string $filePath) : Array {
    if (!file_exists($filePath)) {
        echo "Datoteka ne postoji" ;
        return [] ;
    }
        $polaznici = file_get_contents(FILE_PATH);
        $nizPolaznika = json_decode($polaznici, true);
        return $nizPolaznika;
}

function encodeFiles (array $users , string $filePath) : void {

    $polaznici = json_encode($users, JSON_PRETTY_PRINT);
    file_put_contents($filePath , $polaznici);
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadaca</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
            <?php 
                $polaznici = jsonToArray(FILE_PATH);
                $kljuc = array_key_first($polaznici);
                foreach($polaznici[$kljuc] as $attribute => $value) : ?>
                <th><?= $attribute; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($polaznici as $polaznik => $podaci) : ?>
                <tr>
                    <?php foreach($podaci as $atributi => $vrijednost) : ?>
                    <td><?= $vrijednost ?></td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <table border="1">
        <thead>
            <tr>
                <?php
                $polaznici[] = [
                    "name" => "Dennis",
                    "surname" => "Jandrić",
                    "age" => 27,
                    "email" => "denis.jandric@gmail.com",
                    "phone" => 385917301613
                ];

                $zadnjiElement = end($polaznici);
                $email = $zadnjiElement['email'];
                $unikat = true;

                foreach($polaznici as $polaznik) {
                    if($polaznik['email'] === $email) {
                        $unikat = false;
                        break;
                    }
                }

                if($unikat) {
                    encodeFiles($polaznici, FILE_PATH);
                    jsonToArray(FILE_PATH); 
                }


                foreach($polaznici[$kljuc] as $attribute => $value) : ?>
                    <th><?= $attribute; ?></th>
                    <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($polaznici as $podaci) : ?>
                <tr>
                    <?php foreach($podaci as $vrijednost) :?>
                    <td><?= $vrijednost; ?></td>
                    <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>

