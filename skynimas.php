<?php

session_start();

include __DIR__.'/Agurkas.php';
include __DIR__.'/Pomidoras.php';
include __DIR__.'/Moliugas.php';

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/login.php');
    die;
}
if(!isset($_SESSION['a'])) {//jeigu nesetinta sesija. Gali buti nesetintas. Jei pirma karta ateini i puslapi, sitas masyvas bus tuscias.
    $_SESSION['a'] = [];
    $_SESSION['agurku ID'] = 0;
    $_SESSION['pomidoru ID'] = 0; //kad pomidorai nesikartotu yra naujas kintamasis
}

//Jeigu norim atvaizduoti, tai darom su get
//jei norim kazka nusiusti, tai einam su post


//skynimo Agurku scenarijus
    if (isset($_POST['skinti'])) {
        foreach ($_SESSION['obj'] as $index => $agurkas ) {
            $agurkas = unserialize($agurkas); // <----- agurko objektas
            $agurkas->skinti($_POST['kiekis'][$agurkas->id]); // <------- atimam agurka
            $agurkas = serialize($agurkas); // <------ vel stringas
            $_SESSION['obj'][$index] = $agurkas; // <----- uzsaugom agurkus
        }
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php');
    die;
    }

//skynimo Pomidoru scenarijus
if (isset($_POST['skintiP'])) {
    foreach ($_SESSION['objP'] as $index => $pomidoras ) {
        $pomidoras = unserialize($pomidoras); // <----- agurko objektas
        $pomidoras->skintiPomidorus($_POST['kiekis'][$pomidoras->id]); // <------- atimam agurka
        $pomidoras = serialize($pomidoras); // <------ vel stringas
        $_SESSION['objP'][$index] = $pomidoras; // <----- uzsaugom agurkus
    }
header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php');
die;
}

//skynimo Agurku scenarijus 
if (isset($_POST['skinti-visus'])) {

    foreach ($_SESSION['obj'] as $index => $agurkas ) { // serializuotas stringas
        $agurkas = unserialize($agurkas); //agurko objektas
        if ($_POST['skinti-visus'] == $agurkas->id) {
            $agurkas->skintiVisus($_POST['skinti-visus'][$agurkas->id]);// atimam agurka
            $agurkas = serialize($agurkas); // vel stringas
            $_SESSION['obj'][$index] = $agurkas; // uzsaugom agurkus
        }
    }

    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php');
    die;   
}

//skynimo Pomidoru scenarijus 
if (isset($_POST['skinti-visusP'])) {

    foreach ($_SESSION['objP'] as $index => $pomidoras ) { // serializuotas stringas
        $pomidoras = unserialize($pomidoras); //agurko objektas
        if ($_POST['skinti-visusP'] == $pomidoras->id) {
            $pomidoras->skintiVisusPomidorus($_POST['skinti-visusP'][$pomidoras->id]);// atimam agurka
            $pomidoras = serialize($pomidoras); // vel stringas
            $_SESSION['objP'][$index] = $pomidoras; // uzsaugom agurkus
        }
    }

    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php');
    die;   
}
//visu agurku nuskynimas
if (isset($_POST['skynimas'])) {

    foreach ($_SESSION['obj'] as $index => $agurkas ) { // serializuotas stringas
        $agurkas = unserialize($agurkas); //agurko objektas
        $agurkas->skintiVisus($_POST['skynimas'][$agurkas->id]);// atimam agurka
        $agurkas = serialize($agurkas); // vel stringas
        $_SESSION['obj'][$index] = $agurkas; // uzsaugom agurkus
    }
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php');
    die; 
}

//visu pomidoru nuskynimas
if (isset($_POST['skynimasP'])) {

    foreach ($_SESSION['objP'] as $index => $pomidoras ) { // serializuotas stringas
        $pomidoras = unserialize($pomidoras); //agurko objektas
        $pomidoras->skintiVisusPomidorus($_POST['skynimas'][$pomidoras->id]);// atimam agurka
        $pomidoras = serialize($pomidoras); // vel stringas
        $_SESSION['objP'][$index] = $pomidoras; // uzsaugom agurkus
    }
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php');
    die; 
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
        position: relative;
    }
    .session {
        position: absolute;
        color: red;
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
        width: 900px;
        margin-left: calc(50% - 500px);
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
        width: 20%;
        text-align: center;
        border: 2px solid #DCDCDC;
        border-radius: 10px;
        padding: 10px 0;
    }
    .agurkas-vnt {
        display:inline-block;
        float: left;
        width: 20%;
        text-align: center;
        margin-top: 55px;
    }
    .btn-skinti-visus {
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
    .btn-skinti-visus:hover {
        color: black;
        border: 2px solid #1877f2;
    }
    .btn-skinti {
        border: 2px solid #DCDCDC;
        display:inline-block;
        float: right;
        width: 22%;
        margin-top: -38px;
        padding: 10px;
        background-color: transparent;
        border-radius: 10px;
        text-transform: uppercase;
        margin-left: 12px;
    }
    .btn-skinti:hover {
        color: black;
        border: 2px solid #1877f2;
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
    .input {
        border: 2px solid #DCDCDC;
        width: 10%;
        margin-top: 45px;
        padding: 10px;
        background-color: transparent;
        border-radius: 10px;
        text-transform: uppercase;
        margin-left: 2px;
    }
    .input:hover {
        color: black;
        border: 2px solid #1877f2;
        border-radius: 10px;
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
        <h1>Daržovių sodas</h1>
        <h3 id="agurkai">Agurkai</h3>
        <form action="#agurkai" method="POST">
        <?php foreach($_SESSION['obj'] as $agurkas): ?>
        <?php $agurkas = unserialize($agurkas) // is agurko stringo vel gaunam objekta ?>
        <div class="form-top">
            <div class="agurkas-nr">
                <img class="agurkas-img" src="<?= $agurkas->photo ?>" alt="photo">
                <div>Agurkas nr. <?= $agurkas->id ?></div>
            </div>
            <div class="agurkas-vnt">Galima skinti: <?= $agurkas->count ?></div>
            <?php if ($agurkas->count != 0) { ?>
                <?php if(isset($_SESSION['ERROR'])) { echo "<span class='session'>" .$_SESSION['ERROR']. "</span>"; unset($_SESSION['ERROR']); }?>
                <?php if(isset($_SESSION['msg'])) { echo "<span class='session'>" .$_SESSION['msg']. "</span>"; unset($_SESSION['msg']); }?>
                <input class="input" name="kiekis[<?= $agurkas->id ?>]" value="<?= $kiekis ?>"><br>
                <button class="btn-skinti" type="submit" name="skinti-visus" value="<?= $agurkas->id ?>">Skinti visus</button>
                <button class="btn-skinti" type="submit" name="skinti" value="<?= $agurkas->id ?>">Skinti</button>
            <?php } ?>
        </div>
    
        <?php endforeach ?>
        <button class="btn-skinti-visus" type="submit" name="skynimas">Skinti visą derlių</button>
        </form>

        <h3 id="pomidorai">Pomidorai</h3>
        <form action="#pomidorai" method="POST">
        <?php foreach($_SESSION['objP'] as $pomidoras): ?>
        <?php $pomidoras = unserialize($pomidoras) // is agurko stringo vel gaunam objekta ?>
        <div class="form-top">
            <div class="agurkas-nr">
                <img class="agurkas-img" src="<?= $pomidoras->photoP ?>" alt="photo">
                <div>Pomidoro nr. <?= $pomidoras->id ?></div>
            </div>
            <div class="agurkas-vnt">Galima skinti: <?= $pomidoras->count ?></div>
            <?php if ($pomidoras->count != 0) { ?>
                <?php if(isset($_SESSION['ERROR1'])) { echo "<span class='session'>" .$_SESSION['ERROR1']. "</span>"; unset($_SESSION['ERROR1']); }?>
                <?php if(isset($_SESSION['msg1'])) { echo "<span class='session'>" .$_SESSION['msg1']. "</span>"; unset($_SESSION['msg1']); }?>
                <input class="input" name="kiekis[<?= $pomidoras->id ?>]" value="<?= $kiekis ?>"><br>
                <button class="btn-skinti" type="submit" name="skinti-visusP" value="<?= $pomidoras->id ?>">Skinti visus</button>
                <button class="btn-skinti" type="submit" name="skintiP" value="<?= $pomidoras->id ?>">Skinti</button>
            <?php } ?>
        </div>
    
        <?php endforeach ?>
        <button class="btn-skinti-visus" type="submit" name="skynimasP">Skinti visą derlių</button>
        </form>
          
    </main>

</body>

</html>