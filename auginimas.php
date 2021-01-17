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

        //listo scenarijus
    if (isset($rawData['listAuginimasM'])) {
        ob_start();
        include __DIR__.'/listAuginimasM.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listAuginimasM' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    
    }

    //listo scenarijus
    if (isset($rawData['listAuginimasP'])) {
        ob_start();
        include __DIR__.'/listAuginimasP.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listAuginimasP' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    
    }

        //auginam agurkus
        elseif (isset($rawData['auginti'])) {
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

        //auginam pomidorus
        elseif (isset($rawData['augintiP'])) {
    
            $store->augintiPomidorus();
            
            //pasodine agurkus jungsim buferi
            ob_start();
            include __DIR__.'/listAuginimasP.php';//liepsiu listau sugeneruoti nauja sarasa
            $out = ob_get_contents();//viskas subegs i buferi
            ob_end_clean();
            $json = ['listAuginimasP' => $out];//issiusime agurku lista
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(201);//
            echo $json;
            die;
        }

        //auginam moliugus
        elseif (isset($rawData['augintiM'])) {
    
            $store->augintiMoliugus();
            
            //pasodine agurkus jungsim buferi
            ob_start();
            include __DIR__.'/listAuginimasM.php';//liepsiu listau sugeneruoti nauja sarasa
            $out = ob_get_contents();//viskas subegs i buferi
            ob_end_clean();
            $json = ['listAuginimasM' => $out];//issiusime agurku lista
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(201);//
            echo $json;
            die;
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script><!-- defer nurodo, kad uzsikrautu veliau-->
    <script src="http://localhost:8888/dashboard/agurkai/agurku-sodas/js/auginimas.js" defer></script> <!-- cia rasyti pilna kelia -->
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
        <div id="error"></div>
            <form class="form" action="<?= URL.'auginimas' ?>" method="POST">
            <div id="listAuginimas">
            </div>
            <div id="listAuginimasP">
            </div>
                <div id="listAuginimasM">
                </div>
            

            <div class="sodinti">
                <button class="btn-auginti auginti" type="button" name="auginti">AUGINTI AGURKUS</button>
                <button class="btn-auginti augintiP" type="button" name="augintiP">AUGINTI POMIDORUS</button>
                <button class="btn-auginti augintiM" type="button" name="augintiM">AUGINTI MOLIŪGUS</button>
                <button class="btn-auginti augintiV" type="button" name="augintiV">AUGINTI VISUS</button>
            </div>
            </form>
        </div>

    </main>

</body>
</html>