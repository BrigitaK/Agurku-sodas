<?php
//SKAITYMAS IS DVIEJU LENTELIU

$host = 'localhost';
$db   = 'biblioteka';
$user = 'test';
$pass = '123456';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
     
$pdo = new PDO($dsn, $user, $pass, $options);

// SKAITYMAS 
// paprasom kad viska parodytu
$sql = "SELECT *
FROM books
INNER JOIN authors
ON books.author_id = authors.id;";