<?php

session_start();

include __DIR__ . '/vendor/autoload.php'; // <-------- autoloadiname vendoriaus faila

use Main\App;
use Cucumber\Agurkas;

App::session();

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    App::redirect(login);
}

//auginimo scenarijus
if (isset($_POST['auginti'])) {
    App::augintiAgurka();
}

//auginimam pomidorus
if (isset($_POST['augintiP'])) {
    App::augintiPomidora();
}

//auginimam moliugus
if (isset($_POST['augintiM'])) {
    App::augintiMoliuga();
}

//auginimam visus
if (isset($_POST['augintiV'])) {
    App::augintiVisasDarzoves();
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
                    <?php $kiekis = $agurkas->auginti() ?>
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
                    <img class="agurkas-img" src="<?= $pomidoras->photo ?>" alt="photo">
                    <?php $kiekis = $pomidoras->auginti() ?>
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
                    <img class="agurkas-img" src="<?= $moliugas->photo ?>" alt="photo">
                    <?php $kiekis = $moliugas->auginti() ?>
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
                <button class="btn-auginti" type="submit" name="augintiV">AUGINTI VISUS</button>
            </div>
            </form>
        </div>

    </main>

</body>
</html>