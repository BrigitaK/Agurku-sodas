<?php


namespace Main\Controllers;
use Main\App, Main\Store, Main\Agurkas, Main\Pomidoras, Main\Moliugas;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class SodinimasController {

private $store, $rawData;

    public function __construct() {
        if('POST' === $_SERVER['REQUEST_METHOD']){
            $this->store = App::store('darzoves');
           // $this->rawData = file_get_contents("php://input");
            $this->rawData = App::$request->getContent(); //symfony
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
    // public function index()
    // {
    //     include DIR.'/views/sodinimas/index.php';
    // }

    public function index()
    {
        $response = new Response(
            'Content',
            200,
            ['content-type' => 'text/html']
        );
        ob_start();
        include DIR.'/views/sodinimas/index.php';
        $out = ob_get_contents();
        ob_end_clean();
        
        $response->setContent($out);
        $response->prepare(App::$request);

        return $response;
        
    }
    
    //listo scenarijus
    public function list()
    {
        ob_start();
        //kreipiames i views ir perduodam kintamuosius
            $store = App::store('darzoves');//kintamojo perdavimas i views
            include DIR.'/views/sodinimas/list.php';
            $out = ob_get_contents();
            ob_end_clean();

            $json = ['list' => $out];

            $response = new JsonResponse($json);
    
            $response->prepare(App::$request);
    
            return $response;
    }
     //listo scenarijus
     public function listM() 
     {
         ob_start();
        //kreipiames i views ir perduodam kintamuosius
            $store = App::store('darzoves');//kintamojo perdavimas i views
            include DIR.'/views/sodinimas/listM.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['listM' => $out];
            $response = new JsonResponse($json);
    
            $response->prepare(App::$request);
    
            return $response;
    }
        //listo scenarijus
    public function listP() 
    {   
        ob_start();
        //kreipiames i views ir perduodam kintamuosius
            $store = App::store('darzoves'); //kintamojo perdavimas i views
            
            include DIR.'/views/sodinimas/listP.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['listP' => $out];
            $response = new JsonResponse($json);
    
            $response->prepare(App::$request);
    
            return $response;
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
            $response = new JsonResponse($json);
    
            $response->prepare(App::$request);
    
            return $response;
        }

        foreach(range(1, $kiekis) as $_) {
            $agurkoObj = new Agurkas($this->store->getNewId());
            $this->store->addNew($agurkoObj);
        }
        ob_start();
        //pasodine agurkus jungsim buferi
        $store = $this->store;//kintamojo perdavimas i views
        include DIR.'/views/sodinimas/list.php';//liepsiu listui sugeneruoti nauja sarasa
        $out = ob_get_contents();//viskas subegs i buferi
        ob_end_clean();
        $json = ['list' => $out];//issiusime agurku lista
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
    
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
        ob_start();
        //pasodine agurkus jungsim buferi
        $store = $this->store;//kintamojo perdavimas i views
        include DIR.'/views/sodinimas/listM.php';//liepsiu listau sugeneruoti nauja sarasa
        $out = ob_get_contents();//viskas subegs i buferi
        ob_end_clean();
        $json = ['listM' => $out];//issiusime agurku lista
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
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
        ob_start();
        //pasodine agurkus jungsim buferi
        $store = $this->store;//kintamojo perdavimas i views
        include DIR.'/views/sodinimas/listP.php';//liepsiu listau sugeneruoti nauja sarasa
        $out = ob_get_contents();//viskas subegs i buferi
        ob_end_clean();
        $json = ['listP' => $out];//issiusime agurku lista
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
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
        $response = new JsonResponse($json);
    
            $response->prepare(App::$request);
    
            return $response;
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
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
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
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
    }

    //raunam moliuga
    public function rautiM() 
    {
        $this->store->removeM($this->rawData['id']); 

        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/sodinimas/listM.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listM' => $out];
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
    }

}