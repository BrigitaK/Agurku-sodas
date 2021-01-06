<?php

//padaryti pomidoru ir agurku teva
//

session_start();

spl_autoload_register(function ($class){

    $prefix = '';
    $base_dir = '';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});


//sukurti klase su statiniais metodais i augunimo metoda ir sesija su agurku id ir sodinimo koda
//neliesti validaciju
//app redirech auginimas
//tevas turi tureti metoda k
//klase app, turi tureti statiniu metodu ir tie statiniai metodai ir jie turi buti irasomi

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
    $_SESSION['photo'] = '';

    $_SESSION['objM'] = []; // sukuriam objektu masyva, laikysim pomidoru objektus
    $_SESSION['moliugu ID'] = 0; //kad pomidorai nesikartotu yra naujas kintamasis
    $_SESSION['photo'] = '';
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

if(isset($_POST['sodintiM'])) {

    $moliugoObj = new Moliugas($_SESSION['moliugu ID']);//irasomas objektas, pasidarom nauja agurka
    ++$_SESSION['moliugu ID'];
    $_SESSION['objM'][]= serialize($moliugoObj); //irasom serializuota objekta paversta i stringa
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas.php');
    die;
}
if(isset($_POST['sodintiV'])) {

    $moliugoObj = new Moliugas($_SESSION['moliugu ID']);//irasomas objektas, pasidarom nauja agurka
    ++$_SESSION['moliugu ID'];
    $_SESSION['objM'][]= serialize($moliugoObj); //irasom serializuota objekta paversta i stringa
    $pomidoroObj = new Pomidoras($_SESSION['pomidoru ID']);//irasomas objektas, pasidarom nauja agurka
    ++$_SESSION['pomidoru ID'];
    $_SESSION['objP'][]= serialize($pomidoroObj); //irasom serializuota objekta paversta i stringa
    $agurkoObj = new Agurkas($_SESSION['agurku ID']);//irasomas objektas, pasidarom nauja agurka
    ++$_SESSION['agurku ID'];
    $_SESSION['obj'][]= serialize($agurkoObj); //irasom serializuota objekta paversta i stringa
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
            $agurkas->redirect(sodinimas);
        }
    }
}

//raunam Pomidora
if(isset($_POST['rautiP'])) {
    foreach($_SESSION['objP'] as $index => $pomidoras) {
        $pomidoras = unserialize($pomidoras);
        if ($_POST['rautiP'] == $pomidoras->id) {
            unset($_SESSION['objP'][$index]);
            $pomidoras->redirect(sodinimas);
        }
    }
}

//raunam moliuga
if(isset($_POST['rautiM'])) {
    foreach($_SESSION['objM'] as $index => $moliugas) {
        $moliugas = unserialize($moliugas);
        if ($_POST['rautiM'] == $moliugas->id) {
            unset($_SESSION['objM'][$index]);
            $moliugas->redirect(sodinimas);
        }
    }
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