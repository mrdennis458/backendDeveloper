<?php

const USERS_CSV = __DIR__ . '/podaci/users.csv';

if (($handle = fopen(USERS_CSV, 'r')) !== false) {

    $data = [];
    while(($row = fgetcsv($handle)) !== false){
        $data[] = $row;
    }

    // zatvrite stream prema datoteci
    fclose($handle);

    var_dump($data);
} else {
    echo 'Unable to open the file.';
}