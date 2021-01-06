<?php

session_start();

include __DIR__.'/Agurkas.php';
include __DIR__.'/Pomidoras.php';
include __DIR__.'/Moliugas.php';

if(!isset($_SESSION['a'])) {//jeigu nesetinta sesija. Gali buti nesetintas. Jei pirma karta ateini i puslapi, sitas masyvas bus tuscias.
    $_SESSION['a'] = [];
    $_SESSION['agurku ID'] = 0; //kad agurkai nesikartotu yra naujas kintamasis
    $_SESSION['pomidoru ID'] = 0; //kad pomidorai nesikartotu yra naujas kintamasis
    $_SESSION['moliugu ID'] = 0; //kad moliugai nesikartotu yra naujas kintamasis
}

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/login.php');
    die;
}

//auginimo scenarijus
if (isset($_POST['auginti'])) {
    //foreach ($_SESSION['a'] as $index => &$agurkas ) {
    //    $agurkas['agurkai'] += $_POST['kiekis'][$agurkas['id']];
    //}

    //objektai yra perduodami pagal referenca
    //auginimas su objektu
    foreach ($_SESSION['obj'] as $index => $agurkas ) { // serializuotas stringas
        $agurkas = unserialize($agurkas); //agurko objektas
        $agurkas->addAgurkas($_POST['kiekis'][$agurkas->id]);// pridedam agurka
        $agurkas = serialize($agurkas); // vel stringas
        $_SESSION['obj'][$index] = $agurkas; // uzsaugom agurkus
    }

    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/auginimas.php');
    die;
}

//auginimam pomidorus
if (isset($_POST['augintiP'])) {

    //objektai yra perduodami pagal referenca
    //auginimas su objektu
    foreach ($_SESSION['objP'] as $index => $pomidoras ) { // serializuotas stringas
        $pomidoras = unserialize($pomidoras); //agurko objektas
        $pomidoras->addPomidoras($_POST['kiekis'][$pomidoras->id]);// pridedam agurka
        $pomidoras = serialize($pomidoras); // vel stringas
        $_SESSION['objP'][$index] = $pomidoras; // uzsaugom agurkus
    }

    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/auginimas.php');
    die;
}

//auginimam moliugus
if (isset($_POST['augintiM'])) {

    //objektai yra perduodami pagal referenca
    //auginimas su objektu
    foreach ($_SESSION['objM'] as $index => $moliugas ) { // serializuotas stringas
        $moliugas = unserialize($moliugas); //agurko objektas
        $moliugas->addMoliugas($_POST['kiekis'][$moliugas->id]);// pridedam agurka
        $moliugas = serialize($moliugas); // vel stringas
        $_SESSION['objM'][$index] = $moliugas; // uzsaugom agurkus
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
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/layout.css" />
    <title>Auginimas</title>
</head>
<body>

    <nav>
    <a class="loggout" href="login.php?logout">Atsijungti</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php">Skynimas</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/auginimas.php">Auginimas</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas.php">Sodinimas</a>
    </nav>
    
    <main>
        <h1 id="agurkai">Daržovių auginimas</h1>
        <div class="container">
            <form class="form" action="#agurkai" method="POST">
            <?php foreach($_SESSION['obj'] as $agurkas): ?>
            <?php $agurkas = unserialize($agurkas) // is agurko stringo vel gaunam objekta ?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $agurkas->photo ?>" alt="photo">
                    <?php $kiekis = rand(2,9) ?>
                    <div class="name">Agurkas nr. <?= $agurkas->id ?></div>
                </div>
                <div class="agurkas-vnt">Agurkų: <?= $agurkas->count ?></div>
                <h3 class="kiekis" >+<?= $kiekis ?></h3>
                <input type="hidden" name="kiekis[<?=$agurkas->id ?>]" value="<?= $kiekis ?>">
            </div>
            <?php endforeach ?>
            <?php foreach($_SESSION['objP'] as $pomidoras): ?>
             <?php $pomidoras = unserialize($pomidoras) // is agurko stringo vel gaunam objekta ?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $pomidoras->photoP ?>" alt="photo">
                    <?php $kiekis = rand(1,3) ?>
                    <div class="name">Pomidoro nr. <?= $pomidoras->id ?></div>
                </div>
                <div class="agurkas-vnt">Pomidorų: <?= $pomidoras->count ?></div>
                <h3 class="kiekis" >+<?= $kiekis ?></h3>
                <input type="hidden" name="kiekis[<?=$pomidoras->id ?>]" value="<?= $kiekis ?>">
            </div>
            <?php endforeach ?>
            <?php foreach($_SESSION['objM'] as $moliugas): ?>
            <?php $moliugas = unserialize($moliugas) // is agurko stringo vel gaunam objekta ?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $moliugas->photoM ?>" alt="photo">
                    <?php $kiekis = rand(1,3) ?>
                    <div>Moliūgo nr. <?= $moliugas->id ?></div>
                </div>
                <div class="agurkas-vnt">Moliūgų: <?= $moliugas->count ?></div>
                <h3 class="kiekis" >+<?= $kiekis ?></h3>
                <input type="hidden" name="kiekis[<?=$moliugas->id ?>]" value="<?= $kiekis ?>">
            </div>
            <?php endforeach ?>

            <div class="sodinti">
                <button class="btn-auginti" type="submit" name="auginti">AUGINTI AGURKUS</button>
                <button class="btn-auginti" type="submit" name="augintiP">AUGINTI POMIDORUS</button>
                <button class="btn-auginti" type="submit" name="augintiM">AUGINTI MOLIŪGUS</button>
            </div>
            </form>
        </div>

    </main>

</body>
</html>