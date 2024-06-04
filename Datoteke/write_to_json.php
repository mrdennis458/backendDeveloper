<?php

const FILE_PATH = __DIR__ . '/Podaci/knjige.json';

$books = file_get_contents(FILE_PATH);

$books = json_decode($books, true);

$books[] = [
    "title" => "Lord of the rings",
    "author" => "J.R.R. Tolkien",
    "available" => false,
    "pages" => 1200,
    "isbn" => 2456415365
];

$books = json_encode($books);

file_put_contents(FILE_PATH, $books);