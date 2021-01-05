<?php

session_start();

include __DIR__.'/Agurkas.php';
include __DIR__.'/Pomidoras.php';

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/login.php');
    die;
}
if(!isset($_SESSION['a'])) {//jeigu nesetinta sesija. Gali buti nesetintas. Jei pirma karta ateini i puslapi, sitas masyvas bus tuscias.
    $_SESSION['a'] = [];
    $_SESSION['obj'] = []; // sukuriam objektu masyva, laikysim agurku objektus
    $_SESSION['agurku ID'] = 0; //kad agurkai nesikartotu yra naujas kintamasis
    $_SESSION['photo'] = '';

    $_SESSION['objP'] = []; // sukuriam objektu masyva, laikysim pomidoru objektus
    $_SESSION['pomidoru ID'] = 0; //kad pomidorai nesikartotu yra naujas kintamasis
    $_SESSION['photoP'] = '';
}

//sodinimo scenarijus
//reikia detektint sodinimo mygtuka, posto masyve turi atsirasti indeksas 'sodinti'
//automatiskai generuojam indeksa $_SESSION['a'][] ir priskiriam jam nauja agurka
//tuomet agurku id dides vienetu


if(isset($_POST['sodinti'])) {

    //sukuriam konstruktoriu
    $agurkoObj = new Agurkas($_SESSION['agurku ID']);//irasomas objektas, pasidarom nauja agurka
    ++$_SESSION['agurku ID'];

    // norint ideti objekta i sesija reikia paversti i stringa ir atgal atversti i objekta
    $_SESSION['obj'][]= serialize($agurkoObj); //irasom serializuota objekta paversta i stringa

    //kodel mes serializuojam? kadangi mes sita objekta saugosim, bet kokie saugjimai, jeigu mes neturime savo saugojimo irankiuose dokumentinese
    //duomenu bazese, turime paversti i stringa. Sesija yra masyvas, ir i ji galim deti objektus ir isimti objektus. Verciam, nes jis ir taip bus paverstas
    //php veikia trumpai, kai php uzbaigia savo darba visi objektai numirsta, todel laikyti to objekto ir kazko updatinti kai kazkas 
    //ivyksta nera prasmes. Kadangi zinok kad objektas greit numirs, tai mes iskar ji serializuojam ir kai reikia vel i ji kreipiames
    

    //$_SESSION['a'][]= [ 
    //    'id' => ++$_SESSION['agurku ID'],
    //    'agurkai' => 0,
    //];
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas.php');
    die;
    //po post einam antra karta, kad eitume per get
}


if(isset($_POST['sodintiP'])) {

    $pomidoroObj = new Pomidoras($_SESSION['pomidoru ID']);//irasomas objektas, pasidarom nauja agurka
    ++$_SESSION['pomidoru ID'];
    $_SESSION['objP'][]= serialize($pomidoroObj); //irasom serializuota objekta paversta i stringa
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas.php');
    die;
}

//Jeigu norim atvaizduoti, tai darom su get
//jei norim kazka nusiusti, tai einam su post

//isrovimo scenarijus

if(isset($_POST['rauti'])) {
    //foreach($_SESSION['a'] as $index => $agurkas) {
    //    if ($_POST['rauti'] == $agurkas[id]) {
    //        unset($_SESSION['a'][$index];
    //        header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas.php');
    //        die;
    //    }
    //}

    foreach($_SESSION['obj'] as $index => $agurkas) {
        $agurkas = unserialize($agurkas);
        if ($_POST['rauti'] == $agurkas->id) {
            unset($_SESSION['obj'][$index]);
            header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas.php');
            die;
        }
    }
}

//raunam Pomidora
if(isset($_POST['rautiP'])) {
    foreach($_SESSION['objP'] as $index => $pomidoras) {
        $pomidoras = unserialize($pomidoras);
        if ($_POST['rautiP'] == $pomidoras->id) {
            unset($_SESSION['objP'][$index]);
            header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas.php');
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
    <title>Sodinimas</title>
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
    .btn-sodinti {
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
    .btn-sodinti:hover {
        color: black;
        border: 2px solid #1877f2;
    }
    .btn-israuti {
        border: 2px solid #DCDCDC;
        display:inline-block;
        float: right;
        width: 25%;
        margin-top: 45px;
        padding: 10px;
        background-color: transparent;
        border-radius: 10px;
        text-transform: uppercase;
    }
    .btn-israuti:hover {
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
</style>
<body>
    <nav>
    <a class="loggout" href="login.php?logout">Atsijungti</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas.php">Skynimas</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/auginimas.php">Auginimas</a>
    <a href="http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas.php">Sodinimas</a>
    </nav>
    
    <main>
        <h1>Daržovių sodinimas</h1>
        <h3 id="agurkai">Agurkai</h3>
        <form action="#agurkai" method="POST">
        
        <?php foreach($_SESSION['obj'] as $agurkas): //paverciam i obj, norint panaudoti reikia isserializuoti?>
        <?php $agurkas = unserialize($agurkas) // is agurko stringo vel gaunam objekta ?>

        
        <div class="form-top">
            <div class="agurkas-nr">
                <img class="agurkas-img" src="<?= $agurkas->photo ?>" alt="photo"> <!-- kreipiames kaip i savybe -->
                <div>Agurkas nr. <?= $agurkas->id ?></div>
            </div>
            <div class="agurkas-vnt">Agurkų: <?= $agurkas->count ?></div>
            <button class="btn-israuti" type="submit" name="rauti" value="<?= $agurkas->id ?>">Išrauti</button>
        </div>
        <?php endforeach ?>
        <button class="btn-sodinti" type="submit" name="sodinti">SODINTI</button>
        </form>

        <h3 id="pomidorai">Pomidorai</h3>
        <form action="#pomidorai" method="POST">
        
        <?php foreach($_SESSION['objP'] as $pomidoras): //paverciam i obj, norint panaudoti reikia isserializuoti?>
        <?php $pomidoras = unserialize($pomidoras) // is agurko stringo vel gaunam objekta ?>

        
        <div class="form-top">
            <div class="agurkas-nr">
                <img class="agurkas-img" src="<?= $pomidoras->photoP ?>" alt="photo"> <!-- kreipiames kaip i savybe -->
                <div>Pomidoras nr. <?= $pomidoras->id ?></div>
            </div>
            <div class="agurkas-vnt">Pomidorų: <?= $pomidoras->count ?></div>
            <button class="btn-israuti" type="submit" name="rautiP" value="<?= $pomidoras->id ?>">Išrauti</button>
        </div>
        <?php endforeach ?>
        <button class="btn-sodinti" type="submit" name="sodintiP">SODINTI</button>
        </form>
    </main>

</body>
</html>