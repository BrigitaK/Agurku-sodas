<?php

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    Main\App::redirect(login);
}

Main\App::session();


//skynimo Agurku scenarijus
    if (isset($_POST['skinti'])) {
        Main\App::skintiAgurkus();
    }

//skynimo Pomidoru scenarijus
if (isset($_POST['skintiP'])) {
    Main\App::skintiPomidorus();
}

//skynimo moliugu scenarijus
if (isset($_POST['skintiM'])) {
    Main\App::skintiMoliugus();
}

//skynimo Agurku scenarijus 
if (isset($_POST['skinti-visus'])) {
    Main\App::skintiVisusAgurkus();
}

//skynimo Pomidoru scenarijus 
if (isset($_POST['skinti-visusP'])) {
    Main\App::skintiVisusPomidorus();
}

//skynimo moliugu scenarijus 
if (isset($_POST['skinti-visusM'])) {
    Main\App::skintiVisusMoliugus();
}
//visu agurku nuskynimas
if (isset($_POST['skynimas'])) {
    Main\App::visuAgurkuNuskynimas();
}

//visu pomidoru nuskynimas
if (isset($_POST['skynimasP'])) {
    Main\App::visuPomidoruNuskynimas();
}

//visu moliugu nuskynimas
if (isset($_POST['skynimasM'])) {
    Main\App::visuMoliuguNuskynimas();
}

//visu moliugu nuskynimas
if (isset($_POST['skynimasV'])) {
    Main\App::visuDarzoviuNuskynimas();
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
        width: 27%;
        margin-left: 3px;
        text-align: left;
    }
    .agurkas-vnt {
        position: relative;
        margin-top: 10px;
        margin-right: 10px;

        margin-bottom: 15px;
    }
</style>
<body>
    <nav>
        <a class="loggout" href="login/logout">Atsijungti</a>
        <a href="<?= URL.'skynimas' ?>">Skynimas</a>
        <a href="<?= URL.'auginimas' ?>">Auginimas</a>
        <a href="<?= URL.'sodinimas' ?>">Sodinimas</a>
    </nav>
    
    <main>
        <h1>Daržovių skynimas</h1>
        <div class="container">
            <?php if(isset($_SESSION['ERROR'])) { echo "<span class='session'>" .$_SESSION['ERROR']. "</span>"; unset($_SESSION['ERROR']); }?>
            <?php if(isset($_SESSION['msg'])) { echo "<span class='session'>" .$_SESSION['msg']. "</span>"; unset($_SESSION['msg']); }?>
            <form class="form" action="<?= URL.'skynimas' ?>" method="POST">
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
                    <img class="agurkas-img" src="<?= $pomidoras->photo ?>" alt="photo">
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
                    <img class="agurkas-img" src="<?= $moliugas->photo ?>" alt="photo">
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