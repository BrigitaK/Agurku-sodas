<?php

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    Main\App::redirect(login);
}

$store = new Main\Store('darzoves');


if('POST' == $_SERVER['REQUEST_METHOD']) {
    $rawData = file_get_contents("php://input");
    $rawData = json_decode($rawData,1);

    // LISTo SCENARIJUS
    if (isset($rawData['list'])) {
        // sleep(3);
            ob_start();
            include __DIR__.'/list.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['list' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(200);
            echo $json;
            die;
        
    }

    //sodinimo scenarijus
    if (isset($rawData['sodinti'])) {
        $agurkoObj = new Main\Agurkas($store->getNewId());
        $store->addNew($agurkoObj);
    }
    //pasodine agurkus jungsim buferi
    ob_start();
    include __DIR__.'/list.php';//liepsiu listau sugeneruoti nauja sarasa
    $out = ob_get_contents();//viskas subegs i buferi
    ob_end_clean();
    $json = ['list' => $out];//issiusime agurku lista
    $json = json_encode($json);
    header('Content-type: application/json');
    http_response_code(201);//
    echo $json;
    die;
  
}


if(isset($rawData['sodintiM'])) {
    $moliugoObj = new Main\Moliugas($store->getNewId());
    $store->addNewM($moliugoObj);
    Main\App::redirect('sodinimas');
}

if(isset($rawData['sodintiP'])) {
    $pomidoroObj = new Main\Pomidoras($store->getNewId());
    $store->addNewP($pomidoroObj);
    Main\App::redirect('sodinimas');
}

if(isset($rawData['sodintiV'])) {
    $agurkoObj = new Main\Agurkas($store->getNewId());
    $store->addNew($agurkoObj);
    $moliugoObj = new Main\Moliugas($store->getNewId());
    $store->addNewM($moliugoObj);
    $pomidoroObj = new Main\Pomidoras($store->getNewId());
    $store->addNewP($pomidoroObj);
    Main\App::redirect('sodinimas');
}

//isrovimo scenarijus

if(isset($rawData['rauti'])) {
    $store->remove($rawData['rauti']);
    Main\App::redirect('sodinimas');
}

//raunam Pomidora
if(isset($rawData['rautiP'])) {
    $store->removeP($rawData['rautiP']);
    Main\App::redirect('sodinimas');
}

//raunam moliuga
if(isset($rawData['rautiM'])) {
    $store->removeM($rawData['rautiM']);
    Main\App::redirect('sodinimas');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/layout.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script><!-- defer nurodo, kad uzsikrautu veliau-->
    <script src="http://localhost:8888/dashboard/agurkai/agurku-sodas/js/app.js" defer></script> <!-- cia rasyti pilna kelia -->
    <script>const apiUrl = "http://localhost:8888/dashboard/agurkai/agurku-sodas/js/app.js" </script>
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
                <div  id="list">
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
                </div>
            <?php foreach($store->getAllP() as $pomidoras): //paverciam i obj, norint panaudoti reikia isserializuoti?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $pomidoras->photo ?>" alt="photo"> <!-- kreipiames kaip i savybe -->
                    <div class="name">Pomidoras nr. <?= $pomidoras->id ?></div>
                </div>
                <div class="agurkas-vnt">Pomidorų: <?= $pomidoras->count ?></div>
                <button class="btn-israuti" type="submit" name="rautiP" value="<?= $pomidoras->id ?>">Išrauti</button>
            </div>
            <?php endforeach ?>
            <?php foreach($store->getAllM() as $moliugas): //paverciam i obj, norint panaudoti reikia isserializuoti?>
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
                <input class="agurkas" type="hidden" name="sodinti" id="cucumber">
                <button class="btn-sodinti" type="submit" name="sodinti">SODINTI AGURKUS</button>
                <input class="pomidoras" type="hidden" name="sodintiP" id="tomato">
                <button class="btn-sodinti" type="submit" name="sodintiP">SODINTI POMIDORUS</button>
                <input class="moliugas" type="hidden" name="sodintiM" id="pumpkin">
                <button class="btn-sodinti" type="submit" name="sodintiM">SODINTI MOLIŪGUS</button>
                <input class="darzoves" type="hidden" name="sodintiV" id="allV">
                <button class="btn-sodinti" type="submit" name="sodintiV">SODINTI VISUS</button>
            </div>
            </form>
        </div>
       
    </main>

</body>
</html>