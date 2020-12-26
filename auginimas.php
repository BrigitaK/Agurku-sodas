<?php

session_start();

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/login.php');
    die;
}
if(!isset($_SESSION['a'])) {//jeigu nesetinta sesija. Gali buti nesetintas. Jei pirma karta ateini i puslapi, sitas masyvas bus tuscias.
    $_SESSION['a'] = [];
    $_SESSION['agurku ID'] = 0;
}

//auginimo scenarijus
if (isset($_POST['auginti'])) {
    foreach ($_SESSION['a'] as $index => &$agurkas ) {
        $agurkas['agurkai'] += $_POST['kiekis'][$agurkas['id']];
    }
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/auginimas.php');
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auginimas</title>
</head>
<style>
    body {

    }
    nav {
        display: inline-block;
        float: right;
        width: 100%;
        margin-bottom: 60px;
        background: #e7e9ec;
        padding: 15px 50px;
        margin-top: -30px;
    }
    nav a {
        display: inline-block;
        float: right;
        text-decoration: none;
        color: black;
        margin-left: 15px;
        padding-top:-10px;
        margin-top: 15px;
    }
    nav a:hover {
        color: #1877f2;
    }
    form {
        display: inline-block;
        width: 700px;
        margin-left: calc(50% - 400px);
        margin-top: 40px;
        border: 2px solid #DCDCDC;
        padding: 40px;
        border-radius: 10px;
        margin-bottom: 70px;
    }
    h1, h3 {
        color: #5c565c;
        text-transform: uppercase;
        text-align: center;
        padding-bottom: 20px;
        
    }
    .loggout {
        margin-top:8px;
        border: 2px solid #5c565c;
        padding: 5px 15px;
        border-radius: 5px;
    }
    .loggout:hover {
        color: black;
        border: 2px solid #1877f2;
    }
    .agurkas-nr {
        display:inline-block;
        float: left;
        width: 25%;
        text-align: center;
        border: 2px solid #DCDCDC;
        border-radius: 10px;
        margin: 10px;
        padding: 10px 0;
    }
    .agurkas-vnt {
        display:inline-block;
        float: left;
        width: 45%;
        text-align: center;
        margin-top: 55px;
    }
    .btn-auginti {
        display: block;
        max-width: 300px;
        text-align: center;
        margin: auto;
        padding: 10px 50px;
        margin-top: 45px;
        border: 2px solid #DCDCDC;
        background-color: transparent;
        border-radius: 10px;
        text-transform: uppercase;
    }
    .btn-auginti:hover {
        color: black;
        border: 2px solid #1877f2;
    }
    .form-top {
        width: 100%;
        display: inline-block;
    }
    .agurkas-img {
        display: inline-block;
        height: 50px;
        width: 100px;
    }
    .kiekis {
        color:red; 
        margin-top: 50px; 
        text-align: left;
    }
    
</style>
<body>

    <nav>
    <a class="loggout" href="login.php?logout">Atsijungti</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php">Skynimas</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/auginimas.php">Auginimas</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas.php">Sodinimas</a>
    </nav>
    
    <main>
        <h1>Agurkų sodas</h1>
        <h3>Auginimas</h3>

        <form action="" method="POST">
        <?php foreach($_SESSION['a'] as $agurkas): ?>
        <div class="form-top">
            <div class="agurkas-nr">
                <img class="agurkas-img" src="<?= $agurkas['photo'] ?>" alt="photo">
                <?php $kiekis = rand(2,9) ?>
                <div>Agurkas nr. <?= $agurkas['id'] ?></div>
            </div>
            <div class="agurkas-vnt">Agurkų: <?= $agurkas['agurkai'] ?></div>
            <h3 class="kiekis" >+<?= $kiekis ?></h3>
            <input type="hidden" name="kiekis[<?=$agurkas['id'] ?>]" value="<?= $kiekis ?>">
        </div>

        <?php endforeach ?>
        <button class="btn-auginti" type="submit" name="auginti">AUGINTI</button>
        </form>
    </main>

</body>
</html>