<?php

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    Main\App::redirect(login);
}

$store = new Main\Store('darzoves');

//auginimo scenarijus
if (isset($_POST['auginti'])) {
    $store->augintiAgurkus();
    Main\App::redirect(auginimas);
}

//auginimam pomidorus
if (isset($_POST['augintiP'])) {
    $store->augintiPomidorus();
    Main\App::redirect(auginimas);
}

//auginimam moliugus
if (isset($_POST['augintiM'])) {
    $store->augintiMoliugus();
    Main\App::redirect(auginimas);
}

//auginimam visus
if (isset($_POST['augintiV'])) {
    $store->augintiAgurkus();
    $store->augintiPomidorus();
    $store->augintiMoliugus();
    Main\App::redirect(auginimas);
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
    <a class="loggout" href="login/logout">Atsijungti</a>
    <a href="<?= URL.'skynimas' ?>">Skynimas</a>
    <a href="<?= URL.'auginimas' ?>">Auginimas</a>
    <a href="<?= URL.'sodinimas' ?>">Sodinimas</a>
    </nav>
    
    <main>
        <h1>Daržovių auginimas</h1>
        <div class="container">
            <form class="form" action="<?= URL.'auginimas' ?>" method="POST">
            <?php foreach($store->getAll() as $agurkas): ?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $agurkas->photo ?>" alt="photo">
                    <?php $kiekis = $agurkas->auga() ?>
                    <div class="name">Agurkas nr. <?= $agurkas->id ?></div>
                </div>
                <div class="agurkas-vnt">Agurkų: <?= $agurkas->count ?></div>
                <h3 class="kiekis" >+<?= $kiekis ?></h3>
                <input type="hidden" name="kiekis[<?=$agurkas->id ?>]" value="<?= $kiekis ?>">
            </div>
            <?php endforeach ?>
            <?php foreach($store->getAllP() as $pomidoras): ?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $pomidoras->photo ?>" alt="photo">
                    <?php $kiekis = $pomidoras->auga() ?>
                    <div class="name">Pomidoro nr. <?= $pomidoras->id ?></div>
                </div>
                <div class="agurkas-vnt">Pomidorų: <?= $pomidoras->count ?></div>
                <h3 class="kiekis" >+<?= $kiekis ?></h3>
                <input type="hidden" name="kiekis[<?=$pomidoras->id ?>]" value="<?= $kiekis ?>">
            </div>
            <?php endforeach ?>
            <?php foreach($store->getAllM() as $moliugas): ?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $moliugas->photo ?>" alt="photo">
                    <?php $kiekis = $moliugas->auga() ?>
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