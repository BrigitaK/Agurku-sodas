<?php


namespace Main\Controllers;
use Main\App, Main\Store, Main\Agurkas, Main\Pomidoras, Main\Moliugas;

class SodinimasController {

private $store, $rawData;

    public function __construct() {
        if('POST' === $_SERVER['REQUEST_METHOD']){
            $this->store = new Store('darzoves');
            $this->rawData = file_get_contents("php://input");
            $this->rawData = json_decode($this->rawData, 1);
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
    //sodinimo puslapio rodymo scenarijus
    public function index()
    {
        include DIR.'/views/sodinimas/index.php';
    }
    //listo scenarijus
    public function list()
    {
        //kreipiames i views ir perduodam kintamuosius
            $store = $this->store;//kintamojo perdavimas i views
            ob_start();
            include DIR.'/views/sodinimas/list.php';
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
     public function listM() 
     {
        //kreipiames i views ir perduodam kintamuosius
            $store = $this->store;//kintamojo perdavimas i views
            ob_start();
            include DIR.'/views/sodinimas/listM.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['listM' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(200);
            echo $json;
            die;
    }
        //listo scenarijus
    public function listP() 
    {
        //kreipiames i views ir perduodam kintamuosius
            $store = $this->store; //kintamojo perdavimas i views
            ob_start();
            include DIR.'/views/sodinimas/listP.php';
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
   public function sodintiA() 
   {
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
            include DIR.'/views/error.php';
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
            $agurkoObj = new Agurkas($this->store->getNewId());
            $this->store->addNew($agurkoObj);
        }
        //pasodine agurkus jungsim buferi
        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/sodinimas/list.php';//liepsiu listui sugeneruoti nauja sarasa
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
    public function sodintiM() 
    {
        //$kiekis = $rawData['kiekis'];
        $kiekis = 1;

        foreach(range(1, $kiekis) as $_) {
            $moliugoObj = new Moliugas($this->store->getNewId());
            $this->store->addNewM($moliugoObj);
        }
        //pasodine agurkus jungsim buferi
        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/sodinimas/listM.php';//liepsiu listau sugeneruoti nauja sarasa
        $out = ob_get_contents();//viskas subegs i buferi
        ob_end_clean();
        $json = ['listM' => $out];//issiusime agurku lista
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);//
        echo $json;
        die;
    }
    //pomidoru sodinimas
    public function sodintiP() 
    {
        //$kiekis = $rawData['kiekis'];
        $kiekis = 1;

        foreach(range(1, $kiekis) as $_) {
            $pomidoroObj = new Pomidoras($this->store->getNewId());
            $this->store->addNewP($pomidoroObj);
        }
        //pasodine agurkus jungsim buferi
        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/sodinimas/listP.php';//liepsiu listau sugeneruoti nauja sarasa
        $out = ob_get_contents();//viskas subegs i buferi
        ob_end_clean();
        $json = ['listP' => $out];//issiusime agurku lista
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);//
        echo $json;
        die;
    }
    public function sodintiV() 
    {
        //$kiekis = $rawData['kiekis'];
        $kiekis = 1;

        foreach(range(1, $kiekis) as $_) {
            $pomidoroObj = new Pomidoras($this->store->getNewId());
            $this->store->addNewP($pomidoroObj);
            $moliugoObj = new Moliugas($this->store->getNewId());
            $this->store->addNewM($moliugoObj);
            $agurkoObj = new Agurkas($this->store->getNewId());
            $this->store->addNew($agurkoObj);
        }
        //pasodine agurkus jungsim buferi
        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/sodinimas/listV.php';//liepsiu listau sugeneruoti nauja sarasa
        $out = ob_get_contents();//viskas subegs i buferi
        ob_end_clean();
        $json = ['listV' => $out];//issiusime agurku lista
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);//
        echo $json;
        die;
    }

    //isrovimo scenarijus

    public function rauti() 
    {
        //$this->store->remove($rawData['rauti']); //persiduodam rauti per id
        $this->store->remove($this->rawData['id']); 

        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/sodinimas/list.php';//liepsiu listau sugeneruoti nauja sarasa
        $out = ob_get_contents();//viskas subegs i buferi
        ob_end_clean();
        $json = ['list' => $out];//issiusime agurku lista
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);//
        echo $json;
        die;
    }
    //raunam Pomidora

    public function rautiP() 
    {
        $this->store->removeP($this->rawData['id']); 

        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/sodinimas/listP.php';//liepsiu listau sugeneruoti nauja sarasa
        $out = ob_get_contents();//viskas subegs i buferi
        ob_end_clean();
        $json = ['listP' => $out];//issiusime agurku lista
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);//
        echo $json;
        die;
    }

    //raunam moliuga
    public function rautiM() 
    {
        $this->store->removeM($this->rawData['id']); 
        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/auginimas/listM.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listM' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    }

}