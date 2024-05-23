<?php

$users = [
    ['ime' => 'Dennis', 'prezime' => 'Jandrić', 'godine' => '27', 'spol' => 'M'],
    ['ime' => 'Alex', 'prezime' => 'Dobrinić', 'godine' => '36', 'spol' => 'M'],
];

print_r($users);
echo"<br>";
foreach ($users as &$user) {
    unset($user['spol']);
}
print_r($users);
echo"<br>";
array_push($users, ['ime' => 'Cristiano' , 'prezime' => 'Ronaldo' , 'godine' => '39']);
print_r($users);