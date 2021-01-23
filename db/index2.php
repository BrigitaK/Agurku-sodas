<?php
//SKAITYMAS IS DVIEJU LENTELIU

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



//SKAITYMAS 
//paprasom kad viska parodytu
// $sql = "SELECT *
// FROM customers
// INNER JOIN products
// ON customers.id = products.customer_id;";

// $sql = "SELECT customers.id as customer_id,
//  customers.name as customer_name,
//  surname,
//  products.id as product_id,
//  `type`,
// products.name as vegetable
// FROM customers
// LEFT JOIN products
// ON customers.id = products.customer_id
// WHERE customers.name = 'Jonas';"; //gali buti inner, left, right join
// //ORDER BY customers.name pagal ka surikiuoti
// $stmt = $pdo->query($sql);//db atsakymas, steitmentas

// //kas steitmente yra, kreipiames i fetch
// $masyvas = [];
// //paprasom, kad db pasakytu viska
// while ($row = $stmt->fetch())
// {
//     $masyvas[] = $row;
// }
//REDAGAVIMAS
$sql = "UPDATE darzove
SET count=5
WHERE `name`='Agurkas';";
//siunciam i db
$pdo->query($sql);

//SKAITYMAS
$sql = "SELECT * FROM darzove;";
$stmt = $pdo->query($sql);//db atsakymas, steitmentas

//kas steitmente yra, kreipiames i fetch
$masyvas = [];
//paprasom, kad db pasakytu viska
while ($row = $stmt->fetch())
{
    $masyvas[] = $row;
}
print_r($masyvas);