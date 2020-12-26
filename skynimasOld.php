<?php

session_start();

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/login.php');
    die;
}
if(!isset($_SESSION['a'])) {//jeigu nesetinta sesija. Gali buti nesetintas. Jei pirma karta ateini i puslapi, sitas masyvas bus tuscias.
    $_SESSION['a'] = [];
    $_SESSION['agurku ID'] = 0;
    $_SESSION['photo'] = '';
}

//skynimo scenarijus
if (isset($_POST['skinti'])) {
    foreach ($_SESSION['a'] as $index => &$agurkas ) {
        $agurkas['agurkai'] -= $_POST['kiek-skinti'][$agurkas['id']];
    }
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php');
    die;
}



//Jeigu norim atvaizduoti, tai darom su get
//jei norim kazka nusiusti, tai einam su post

//isrovimo scenarijus

if(isset($_POST['skynimas'])) {
    foreach($_SESSION['a'] as $index => &$agurkas) {
        if ($_POST['skynimas'] == $agurkas['id']) {
            $agurkas['agurkai'] == 0;
            header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php');
            die;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skynimas</title>
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
        width: 1200px;
        margin-left: calc(50% - 600px);
        margin-top: 40px;

    }
    @media (max-width: 990px) {
        form {
            width: 700px;
            margin-left: calc(50% - 350px);
        }
    }
    @media (max-width: 1280px) {
        form {
            width: 900px;
            margin-left: calc(50% - 450px);
        }
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
        width: 20%;
    }
    .agurkas-vnt {
        display:inline-block;
        float: left;
        width: 20%;
        margin-top: 50px;
    }
    .btn-skinti-visus {
        display: block;
        max-width: 300px;
        text-align: center;
        margin: auto;
        padding: 10px 50px;
    }
    .btn-skinti {
        display:inline-block;
        float: left;
        width: 19%;
        margin-top: 50px;
    }
    .form-top {
        padding-bottom: 40px;
        width: 100%;
        display: inline-block;
    }
    .agurkas-img {
        display: inline-block;
        height: 50px;
        width: 100px;
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
        <h3>Sodinimas</h3>
        <form action="" method="POST">
        <?php foreach($_SESSION['a'] as $agurkas): ?>
        <div class="form-top">
            <div class="agurkas-nr">
                <?php $photos = array("./photo/agurkas.jpg", "./photo/agurkas1.jpg", "./photo/agurkas2.jpg"); ?>
                <?php $photo = $photos[array_rand($photos)]?>
                <img class="agurkas-img" src="<?=$photo?>" alt="photo">
                <div>Agurkas nr. <?= $agurkas['id'] ?></div>
            </div>

            <div class="agurkas-vnt">Galima skinti: <?= $agurkas['agurkai'] ?></div>

            <input class="btn-skinti" type="text" name="kiek-skinti" value="<?= $_POST['kiek-skinti'] ?? '' ?>"><br>
            <input type="hidden" name="kiek-skinti[<?=$agurkas['id'] ?>]" value="<?= $_POST['kiek-skinti'] ?? '' ?>">
            
            <button class="btn-skinti" type="submit" name="skinti" value="<?= $agurkas['id'] ?>">Skinti</button>
            <button class="btn-skinti" type="submit" name="skinti-visus" value="<?= $agurkas['id'] ?>">Skinti visus</button>
        </div>

    
        <?php endforeach ?>
        <button class="btn-skinti-visus" type="submit" name="skynimas">Skinti visus agurkus</button>
        </form>
    </main>

</body>

</html>