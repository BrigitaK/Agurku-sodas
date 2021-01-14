<?php

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    Main\App::redirect(login);
}

$store = new Main\Store('darzoves');

if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $rawData = file_get_contents("php://input");
    $rawData = json_decode($rawData, 1);
    
    //listo scenarijus
    if (isset($rawData['listAuginimas'])) {
            ob_start();
            include __DIR__.'/listAuginimas.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['listAuginimas' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(200);
            echo $json;
            die;
        
        }
        elseif (isset($rawData['auginti'])) {
        
            $kiekis=1;
            $store->augintiAgurkus();
            
            //pasodine agurkus jungsim buferi
            ob_start();
            include __DIR__.'/listAuginimas.php';//liepsiu listau sugeneruoti nauja sarasa
            $out = ob_get_contents();//viskas subegs i buferi
            ob_end_clean();
            $json = ['listAuginimas' => $out];//issiusime agurku lista
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(201);//
            echo $json;
            die;
        }
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script><!-- defer nurodo, kad uzsikrautu veliau-->
    <script src="http://localhost:8888/dashboard/agurkai/agurku-sodas/js/app.js" defer></script> <!-- cia rasyti pilna kelia -->
    <script>const apiUrlA = "http://localhost:8888/dashboard/agurkai/agurku-sodas/auginimas" </script>
    <title>Auginimas</title>
</head>
<style>
#listAuginimas, #listAuginimasP, #listAuginimasM, #listAuginimasV{
        gap: 35px;
        display: flex;
        flex-flow: row wrap;
        justify-content: center;
        align-content: center;
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
        <h1>Daržovių auginimas</h1>
        <div class="container">
            <form class="form" action="<?= URL.'auginimas' ?>" method="POST">
            <div id="listAuginimas">
            <?php foreach($store->getAll() as $agurkas): ?>
            <div class="form-top">
                <div class="agurkas-nr agurkas">
                    <img class="agurkas-img" src="<?= $agurkas->photo ?>" alt="photo">
                    <?php $kiekis = $agurkas->auga() ?>
                    <div class="name">Agurkas nr. <?= $agurkas->id ?></div>
                </div>
                <div class="agurkas-vnt">Agurkų: <?= $agurkas->count ?></div>
                <h3 class="kiekis" >+<?= $kiekis ?></h3>
                <input type="hidden" id="kiekis" name="kiekis[<?=$agurkas->id ?>]" value="<?= $kiekis ?>">
            </div>
            <?php endforeach ?>
            </div>
            <div id="listAuginimasP">
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
            </div>
                <div id="listAuginimasM">
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
                </div>
            

            <div class="sodinti">
                <input type="hidden" name="kiekis">
                <button class="btn-auginti" type="button" name="auginti">AUGINTI AGURKUS</button>
                <button class="btn-auginti" type="submit" name="augintiP">AUGINTI POMIDORUS</button>
                <button class="btn-auginti" type="submit" name="augintiM">AUGINTI MOLIŪGUS</button>
                <button class="btn-auginti" type="submit" name="augintiV">AUGINTI VISUS</button>
            </div>
            </form>
        </div>

    </main>

</body>
</html>