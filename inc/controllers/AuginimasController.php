<?php


namespace Main\Controllers;
use Main\App, Main\Store, Main\Agurkas, Main\Pomidoras, Main\Moliugas;

class AuginimasController {

    private $store;

    public function __construct() {
        if('POST' === $_SERVER['REQUEST_METHOD']){
            $this->store = new Store('darzoves');
        }
    }

    public function login(){
        if(isset($_GET['logout'])) {
            $_SESSION['logged'] = 0;
            App::redirect(login);
        }
        if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
            App::redirect(sodinimas);
        }
    }

    //auginimo puslapio rodymo scenarijus
    public function index()
    {
        include DIR.'/views/auginimas/index.php';
    }
        
    //listo scenarijus
    public function listAuginimas()
    {
        $store = $this->store;//kintamojo perdavimas i views
            ob_start();
            include __DIR__.'/views/auginimas/listAuginimas.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['listAuginimas' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(200);
            echo $json;
            die;
        
    }

    public function listAuginimasM()
    {
        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include __DIR__.'/views/auginimas/listAuginimasM.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listAuginimasM' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    
    }

    public function listAuginimasP()
    {
        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include __DIR__.'/views/auginimas/listAuginimasP.php';
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
    public function auginti()
    {
        $this->store->augintiAgurkus();
            
            //pasodine agurkus jungsim buferi
            $store = $this->store;//kintamojo perdavimas i views
            ob_start();
            include __DIR__.'/views/auginimas/listAuginimas.php';//liepsiu listau sugeneruoti nauja sarasa
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
        public function augintiP()
        {
    
            $this->store->augintiPomidorus();
            
            //pasodine agurkus jungsim buferi
            $store = $this->store;//kintamojo perdavimas i views
            ob_start();
            include __DIR__.'/views/auginimas/listAuginimasP.php';//liepsiu listau sugeneruoti nauja sarasa
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
        public function augintiM()
        {
            $this->store->augintiMoliugus();
            
            //pasodine agurkus jungsim buferi
            $store = $this->store;//kintamojo perdavimas i views
            ob_start();
            include __DIR__.'/views/auginimas/listAuginimasM.php';//liepsiu listau sugeneruoti nauja sarasa
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