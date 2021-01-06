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
    $_SESSION['pomidoru ID'] = 0; 
    $_SESSION['moliugu ID'] = 0; 
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

//skynimo moliugu scenarijus
if (isset($_POST['skintiM'])) {
    foreach ($_SESSION['objM'] as $index => $moliugas ) {
        $moliugas = unserialize($moliugas); // <----- agurko objektas
        $moliugas->skintiMoliugus($_POST['kiekis'][$moliugas->id]); // <------- atimam agurka
        $moliugas = serialize($moliugas); // <------ vel stringas
        $_SESSION['objM'][$index] = $moliugas; // <----- uzsaugom agurkus
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

//skynimo moliugu scenarijus 
if (isset($_POST['skinti-visusM'])) {

    foreach ($_SESSION['objM'] as $index => $moliugas ) { // serializuotas stringas
        $moliugas = unserialize($moliugas); //agurko objektas
        if ($_POST['skinti-visusM'] == $moliugas->id) {
            $moliugas->skintiVisusMoliugus($_POST['skinti-visusM'][$moliugas->id]);// atimam agurka
            $moliugas = serialize($moliugas); // vel stringas
            $_SESSION['objM'][$index] = $moliugas; // uzsaugom agurkus
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

//visu moliugu nuskynimas
if (isset($_POST['skynimasM'])) {

    foreach ($_SESSION['objM'] as $index => $moliugas ) { // serializuotas stringas
        $moliugas = unserialize($moliugas); //agurko objektas
        $moliugas->skintiVisusMoliugus($_POST['skynimas'][$moliugas->id]);// atimam agurka
        $moliugas = serialize($moliugas); // vel stringas
        $_SESSION['objM'][$index] = $moliugas; // uzsaugom agurkus
    }
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php');
    die; 
}

//visu moliugu nuskynimas
if (isset($_POST['skynimasV'])) {

    foreach ($_SESSION['objM'] as $index => $moliugas ) { // serializuotas stringas
        $moliugas = unserialize($moliugas); //agurko objektas
        $moliugas->skintiVisusMoliugus($_POST['skynimas'][$moliugas->id]);// atimam agurka
        $moliugas = serialize($moliugas); // vel stringas
        $_SESSION['objM'][$index] = $moliugas; // uzsaugom agurkus
    }
    foreach ($_SESSION['objP'] as $index => $pomidoras ) { // serializuotas stringas
        $pomidoras = unserialize($pomidoras); //agurko objektas
        $pomidoras->skintiVisusPomidorus($_POST['skynimas'][$pomidoras->id]);// atimam agurka
        $pomidoras = serialize($pomidoras); // vel stringas
        $_SESSION['objP'][$index] = $pomidoras; // uzsaugom agurkus
    }
    foreach ($_SESSION['obj'] as $index => $agurkas ) { // serializuotas stringas
        $agurkas = unserialize($agurkas); //agurko objektas
        $agurkas->skintiVisus($_POST['skynimas'][$agurkas->id]);// atimam agurka
        $agurkas = serialize($agurkas); // vel stringas
        $_SESSION['obj'][$index] = $agurkas; // uzsaugom agurkus
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
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/layout.css" />
    <title>Skynimas</title>
</head>
<style>
    .agurkas-vnt .count {
        position: absolute;
        bottom: -3px;
        margin-left: 5px;
    }
    .agurkas-vnt {
        position: relative;
        margin-top: 10px;
        margin-right: 10px;
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
        <h1 id="agurkai">Daržovių skynimas</h1>
        <div class="container">
            <?php if(isset($_SESSION['ERROR'])) { echo "<span class='session'>" .$_SESSION['ERROR']. "</span>"; unset($_SESSION['ERROR']); }?>
            <?php if(isset($_SESSION['msg'])) { echo "<span class='session'>" .$_SESSION['msg']. "</span>"; unset($_SESSION['msg']); }?>
            <form class="form" action="#agurkai" method="POST">
            <?php foreach($_SESSION['obj'] as $agurkas): ?>
            <?php $agurkas = unserialize($agurkas) // is agurko stringo vel gaunam objekta ?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $agurkas->photo ?>" alt="photo">
                    <div class="name">Agurkas nr. <?= $agurkas->id ?></div>
                </div>
                <div class="agurkas-vnt">Galima skinti: <span class="count"><?= $agurkas->count ?></span></div>
                <?php if ($agurkas->count != 0) { ?>
                    <div class="skinti-input">
                        <input class="input" name="kiekis[<?= $agurkas->id ?>]" value="<?= $kiekis ?>"><br>
                        <button class="btn-skinti-i" type="submit" name="skinti" value="<?= $agurkas->id ?>">Skinti</button>
                    </div>
                    <button class="btn-skinti" type="submit" name="skinti-visus" value="<?= $agurkas->id ?>">Skinti visus</button>
                <?php } ?>
            </div>
            <?php endforeach ?>
            <?php foreach($_SESSION['objP'] as $pomidoras): ?>
            <?php $pomidoras = unserialize($pomidoras) // is agurko stringo vel gaunam objekta ?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $pomidoras->photoP ?>" alt="photo">
                    <div class="name">Pomidoro nr. <?= $pomidoras->id ?></div>
                </div>
                <div class="agurkas-vnt">Galima skinti: <span class="count"><?= $pomidoras->count ?></span></div>
                <?php if ($pomidoras->count != 0) { ?>
                    <div class="skinti-input">
                        <input class="input" name="kiekis[<?= $pomidoras->id ?>]" value="<?= $kiekis ?>"><br>
                        <button class="btn-skinti-i" type="submit" name="skintiP" value="<?= $pomidoras->id ?>">Skinti</button>
                    </div>
                    <button class="btn-skinti" type="submit" name="skinti-visusP" value="<?= $pomidoras->id ?>">Skinti visus</button>
                <?php } ?>
            </div>
            <?php endforeach ?>
            <?php foreach($_SESSION['objM'] as $moliugas): ?>
            <?php $moliugas = unserialize($moliugas) // is agurko stringo vel gaunam objekta ?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $moliugas->photoM ?>" alt="photo">
                    <div class="name">Moliūgo nr. <?= $moliugas->id ?></div>
                </div>
                <div class="agurkas-vnt">Galima skinti: <span class="count"><?= $moliugas->count ?></span></div>
                <?php if ($moliugas->count != 0) { ?>
                    <div class="skinti-input">
                        <input class="input" name="kiekis[<?= $moliugas->id ?>]" value="<?= $kiekis ?>"><br>
                        <button class="btn-skinti-i" type="submit" name="skintiM" value="<?= $moliugas->id ?>">Skinti</button>
                    </div>
                    <button class="btn-skinti" type="submit" name="skinti-visusM" value="<?= $moliugas->id ?>">Skinti visus</button>
                <?php } ?>
            </div>
            <?php endforeach ?>
            <div class="skinti">
                <button class="btn-skinti-visus" type="submit" name="skynimas">Skinti agurkų derlių</button>
                <button class="btn-skinti-visus" type="submit" name="skynimasP">Skinti pomidorų derlių</button>
                <button class="btn-skinti-visus" type="submit" name="skynimasM">Skinti moliūgų derlių</button>
                <button class="btn-skinti-visus" type="submit" name="skynimasV">Skinti daržovių derlių</button>
            </div>
            </form>
        </div>
    </main>

</body>

</html>