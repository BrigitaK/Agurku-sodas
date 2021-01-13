<?php

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    Main\App::redirect(login);
}

$store = new Main\Store('darzoves');


if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $rawData = file_get_contents("php://input");
    $rawData = json_decode($rawData, 1);
    
    //listo scenarijus
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
     //listo scenarijus
     if (isset($rawData['moliugo'])) {
        // sleep(3);
            ob_start();
            include __DIR__.'/moliugo.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['moliugo' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(200);
            echo $json;
            die;
        
        }
        //listo scenarijus
     if (isset($rawData['listP'])) {
        // sleep(3);
            ob_start();
            include __DIR__.'/listP.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['listP' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(200);
            echo $json;
            die;
        
        }
//agurku sodinimo scenarijus
    elseif (isset($rawData['sodintiA'])) {
        
        //$kiekis = $rawData['kiekis'];
        $kiekis = 1;

        if (0 > $kiekis || 4 < $kiekis) {
            if (0 > $kiekis) {
                $error = 1;
            }
            elseif(4 < $kiekis){
                $error = 2;
            }
            ob_start();
            include __DIR__.'/error.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['msg' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(400);
            echo $json;
            die;
        }

        foreach(range(1, $kiekis) as $_) {
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
    //moliugu sodinimas
    elseif (isset($rawData['sodintiM'])) {
        
        //$kiekis = $rawData['kiekis'];
        $kiekis = 1;

        foreach(range(1, $kiekis) as $_) {
            $moliugoObj = new Main\Moliugas($store->getNewId());
            $store->addNewM($moliugoObj);
        }
        //pasodine agurkus jungsim buferi
        ob_start();
        include __DIR__.'/moliugo.php';//liepsiu listau sugeneruoti nauja sarasa
        $out = ob_get_contents();//viskas subegs i buferi
        ob_end_clean();
        $json = ['moliugo' => $out];//issiusime agurku lista
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);//
        echo $json;
        die;
    }
    //pomidoru sodinimas
    elseif (isset($rawData['sodintiP'])) {
        
        //$kiekis = $rawData['kiekis'];
        $kiekis = 1;

        foreach(range(1, $kiekis) as $_) {
            $pomidoroObj = new Main\Pomidoras($store->getNewId());
            $store->addNewP($pomidoroObj);
        }
        //pasodine agurkus jungsim buferi
        ob_start();
        include __DIR__.'/listP.php';//liepsiu listau sugeneruoti nauja sarasa
        $out = ob_get_contents();//viskas subegs i buferi
        ob_end_clean();
        $json = ['listP' => $out];//issiusime agurku lista
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);//
        echo $json;
        die;
    
    }
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
    <script>const apiUrl = "http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas" </script>
    <title>Sodinimas</title>
</head>
<style>
    .list, .listP, .listM {
        gap: 20px;
        display: flex;
        flex-flow: row wrap;
        justify-content: center;
        align-content: center;
        margin-top: 60px;
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



        <h1>Daržovių sodinimas</h1>
        <div class="container">
            <div id="error"></div>
            <form class="form" action="<?= URL.'sodinimas' ?>" method="POST">
                <div class="list" id="list">
                </div>
                <div class="listP" id="listP">
                </div>
                <div class="listM" id="moliugo">
                </div>
            <div class="sodinti">
                <input class="agurkas" type="hidden" name="kiekis" id="cucumber">
                <button class="btn-sodinti" type="button" id="sodintiA" name="sodintiA">SODINTI AGURKUS</button>
                <input class="pomidoras" type="hidden" name="kiekisP" id="tomato">
                <button class="btn-sodinti" type="button" name="sodintiP">SODINTI POMIDORUS</button>
                <input class="moliugas" type="hidden" name="kiekisM" id="pumpkin">
                <button class="btn-sodinti" type="button" name="sodintiM">SODINTI MOLIŪGUS</button>
                <input class="darzoves" type="hidden" name="kiekis" id="allV">
                <button class="btn-sodinti" type="button" name="sodintiV">SODINTI VISUS</button>
            </div>
            </form>
        </div>
       
    </main>

</body>
</html>