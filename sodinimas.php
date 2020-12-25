<?php
//agurku sodas
//sone pasidaryti meniu, kad butu galima vaikscioti per visus tris puslapius
//turime agurku sarasa, turime mygtuka, paspaudus mygtuka prisideda naujas agurkas
//naujas agurkas turi savo unikalu id, reikia paveiksliuku ir prisideda random paveiksliukas prie to agurko
//spaudziam kryziuka israuti ir agurko nebelieka
//antras psl agurku auginimas
//visi agurkai eina vienas paskui kita, didelis sk rodo kiek siuo metu turi agurku.
//kiekviena karta refresinus puslapi parodo random  nuo 2 iki 7 agurku prisides paspaudus auginti
//3 psl agurku skynimas
//as galiu i input ivesti pvz 4 agaurkus ir paspausti skinti, tuomet bendras sk turi sumazeti
//jeigu agurkas turi 0 vaisiu, tuomet parasyta skinti negalima ir nera atvaizduojami mygtukai

//viska saugome sesijoje arba json file

session_start();

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/login.php');
    die;
}
if(!isset($_SESSION['a'])) {//jeigu nesetinta sesija. Gali buti nesetintas. Jei pirma karta ateini i puslapi, sitas masyvas bus tuscias.
    $_SESSION['a'] = [];
    $_SESSION['agurku ID'] = 0;
}

//sodinimo scenarijus

if(isset($_POST['sodinti'])) {
    $_SESSION['a'] [] = [
        'id' => ++$_SESSION['agurku ID'],
        'agurkai' => 0
    ];
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas.php');
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sodinimas</title>
</head>
<style>
    body {
        margin: 50px 100px;
    }
    nav {
        display: inline-block;
        float: right;
        width: 100%;
        margin-bottom: 20px;
    }
    nav a {
        display: inline-block;
        float: right;
        text-decoration: none;
        color: black;
        margin-left: 10px;
    }
    nav a:hover {
        color: red;
    }
    form {
        display: inline-block;
        margin-top: 40px;
    }
    h1 {
        text-align: center;
        margin-top: 30px;
        padding-bottom: 20px;
        
    }
</style>
<body>
    <nav>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php">Skynimas</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/auginimas.php">Auginimas</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas.php">Sodinimas</a>
    </nav>
    
    <main>
        <h1>Agurkų sodas</h1>
        <h3>Sodinimas</h3>
        <form action="" method="POST">
        <?php foreach($_SESSION['a'] as $agurkas): ?>
        Agurkas nr. <?= $agurkas['id'] ?>
    
        <?php endforeach ?>
        <button type="submit" name="sodinti">SODINTI</button>
        </form>
    </main>

</body>
</html>