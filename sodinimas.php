<?php

session_start();

include __DIR__ . '/vendor/autoload.php';

use Main\App;
use Cucumber\Agurkas;
use Tomatoes\Pomidoras;
use Pumpkin\Moliugas;
use Vege\Darzove;
use Greenhouse\Siltnamis;

App::session();

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    App::redirect(login);
}


if(isset($_POST['sodinti'])) {
    BrigitaK\App::sodintiAgurka();
    App::redirect(sodinimas);
}


if(isset($_POST['sodintiP'])) {
    App::sodintiPomidora();
}

if(isset($_POST['sodintiM'])) {
    App::sodintiMoliuga();
}
if(isset($_POST['sodintiV'])) {
    App::sodintiVisasDarzoves();
}

//isrovimo scenarijus

if(isset($_POST['rauti'])) {
    App::rautiAgurka();
}

//raunam Pomidora
if(isset($_POST['rautiP'])) {
    App::rautiPomidora();
}

//raunam moliuga
if(isset($_POST['rautiM'])) {
    App::rautiMoliuga();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/layout.css" />
    <title>Sodinimas</title>
</head>

<body>
    <nav>
    <a class="loggout" href="login.php?logout">Atsijungti</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php">Skynimas</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/auginimas.php">Auginimas</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas.php">Sodinimas</a>
    </nav>
    
    <main>
        <h1 id="agurkai">Daržovių sodinimas</h1>
        <div class="container">
            <form class="form" action="#agurkai" method="POST">
            
            <?php foreach($_SESSION['obj'] as $agurkas): //paverciam i obj, norint panaudoti reikia isserializuoti?>
            <?php $agurkas = unserialize($agurkas) // is agurko stringo vel gaunam objekta ?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $agurkas->photo ?>" alt="photo"> <!-- kreipiames kaip i savybe -->
                    <div class="name">Agurkas nr. <?= $agurkas->id ?></div>
                </div>
                <div class="agurkas-vnt">Agurkų: <?= $agurkas->count ?></div>
                <button class="btn-israuti" type="submit" name="rauti" value="<?= $agurkas->id ?>">Išrauti</button>
            </div>
            <?php endforeach ?>
            <?php foreach($_SESSION['objP'] as $pomidoras): //paverciam i obj, norint panaudoti reikia isserializuoti?>
            <?php $pomidoras = unserialize($pomidoras) // is agurko stringo vel gaunam objekta ?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $pomidoras->photo ?>" alt="photo"> <!-- kreipiames kaip i savybe -->
                    <div class="name">Pomidoras nr. <?= $pomidoras->id ?></div>
                </div>
                <div class="agurkas-vnt">Pomidorų: <?= $pomidoras->count ?></div>
                <button class="btn-israuti" type="submit" name="rautiP" value="<?= $pomidoras->id ?>">Išrauti</button>
            </div>
            <?php endforeach ?>
            <?php foreach($_SESSION['objM'] as $moliugas): //paverciam i obj, norint panaudoti reikia isserializuoti?>
            <?php $moliugas = unserialize($moliugas) // is agurko stringo vel gaunam objekta ?>

            
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $moliugas->photo ?>" alt="photo"> <!-- kreipiames kaip i savybe -->
                    <div class="name">Moliūgo nr. <?= $moliugas->id ?></div>
                </div>
                <div class="agurkas-vnt">Moliūgų: <?= $moliugas->count ?></div>
                <button class="btn-israuti" type="submit" name="rautiM" value="<?= $moliugas->id ?>">Išrauti</button>
            </div>
            <?php endforeach ?>
            <div class="sodinti">
                <button class="btn-sodinti" type="submit" name="sodinti">SODINTI AGURKUS</button>
                <button class="btn-sodinti" type="submit" name="sodintiP">SODINTI POMIDORUS</button>
                <button class="btn-sodinti" type="submit" name="sodintiM">SODINTI MOLIŪGUS</button>
                <button class="btn-sodinti" type="submit" name="sodintiV">SODINTI VISUS</button>
            </div>
            </form>
        </div>
       
    </main>

</body>
</html>