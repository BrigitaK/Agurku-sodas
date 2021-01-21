<?php
$host = 'localhost';
$db   = 'darzoviu_baze';
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

//RASYMAS
//irasom uzklausa
$sql = "INSERT INTO `products` (`type`, `name`, `price`)
VALUES (1, 'Pomidoras', 8.78)"; //duomenys surasomi viengubose kabutese
//issiunciam i db
$pdo->query($sql);

//REDAGAVIMAS
$sql = "UPDATE products
SET price=0.36
WHERE `name`='Agurkas';";
//siunciam i db
$pdo->query($sql);

//TRYNIMAS, visos eilutes istrynimas
$sql = "DELETE FROM products
WHERE `name`='Agurkas';";
//siunciam i db
$pdo->query($sql);


//SKAITYMAS
//paprasom kad viska parodytu
//$sql = "SELECT `id`, `type`, `name`, `price` FROM `products`;";
//kai noriu kad parodytu tik 2 tipo
$sql = "SELECT `id`, `type`, `name`, `price` FROM `products`
WHERE `type` <> 1
ORDER BY price DESC;"; //nelygus <>, lygus = , OR, AND, price DESC atvirksciai

$stmt = $pdo->query($sql);//db atsakymas, steitmentas

//kas steitmente yra, kreipiames i fetch
$masyvas = [];


//paprasom, kad db pasakytu viska
while ($row = $stmt->fetch())
{
    $masyvas[] = $row;
}
print_r($masyvas);