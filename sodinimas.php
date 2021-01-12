<?php

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    Main\App::redirect(login);
}

$store = new Main\Store('agurkas');

// SODINIMO SCENARIJUS AGURKU


if (isset($_POST['sodinti'])) {

    $agurkoObj = new Main\Agurkas($store->getNewId());
    $store->addNew($agurkoObj);
    Main\App::redirect('sodinimas');
}

if(isset($_POST['sodintiM'])) {
    Main\App::sodintiMoliugus();
    Main\App::redirect('sodinimas');
}

if(isset($_POST['sodintiP'])) {
    Main\App::sodintiPomidorus();
    Main\App::redirect('sodinimas');
}

if(isset($_POST['sodintiV'])) {
    Main\App::sodintiVisasDarzoves();
    Main\App::redirect('sodinimas');
}

//isrovimo scenarijus

if(isset($_POST['rauti'])) {
    Main\App::rautiAgurka();
}

//raunam Pomidora
if(isset($_POST['rautiP'])) {
    Main\App::rautiPomidora();
}

//raunam moliuga
if(isset($_POST['rautiM'])) {
    Main\App::rautiMoliuga();
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
        <a class="loggout" href="login/logout">Atsijungti</a>
        <a href="<?= URL.'skynimas' ?>">Skynimas</a>
        <a href="<?= URL.'auginimas' ?>">Auginimas</a>
        <a href="<?= URL.'sodinimas' ?>">Sodinimas</a>
    </nav>
    
    <main>
        <h1>Daržovių sodinimas</h1>
        <div class="container">
            <form class="form" action="<?= URL.'sodinimas' ?>" method="POST">
            <?php foreach($store->getAll() as $agurkas): //paverciam i obj, norint panaudoti reikia isserializuoti?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $agurkas->photo ?>" alt="photo"> <!-- kreipiames kaip i savybe -->
                    <div class="name">Agurkas nr. <?= $agurkas->id ?></div>
                </div>
                <div class="agurkas-vnt">Agurkų: <?= $agurkas->count ?></div>
                <button class="btn-israuti" type="submit" name="rauti" value="<?= $agurkas->id ?>">Išrauti</button>
            </div>
            <?php endforeach ?>
            <?php foreach($store->getAll() as $pomidoras): //paverciam i obj, norint panaudoti reikia isserializuoti?>
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
            <?php foreach($store->getAll() as $moliugas): //paverciam i obj, norint panaudoti reikia isserializuoti?>
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