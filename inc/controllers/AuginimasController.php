<?php


namespace Main\Controllers;
use Main\App, Main\Store, Main\Agurkas, Main\Pomidoras, Main\Moliugas;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuginimasController {

    private $store;

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

    public function index()
    {
        $response = new Response(
            'Content',
            200,
            ['content-type' => 'text/html']
        );
        ob_start();
        include DIR.'/views/auginimas/index.php';
        $out = ob_get_contents();
        ob_end_clean();
        
        $response->setContent($out);
        $response->prepare(App::$request);

        return $response;
        
    }
        
    //listo scenarijus
    public function listAuginimas()
    {
        $store = $this->store;//kintamojo perdavimas i views
            ob_start();
            include DIR.'/views/auginimas/listAuginimas.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['listAuginimas' => $out];
            $response = new JsonResponse($json);
    
            $response->prepare(App::$request);
    
            return $response;
        
    }

    public function listAuginimasM()
    {
        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/auginimas/listAuginimasM.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listAuginimasM' => $out];
        $response = new JsonResponse($json);
    
            $response->prepare(App::$request);
    
            return $response;
    
    }

    public function listAuginimasP()
    {
        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/auginimas/listAuginimasP.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listAuginimasP' => $out];
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
    
    }

        //auginam agurkus
    public function auginti()
    {
        $this->store->augintiAgurkus();
            
            //pasodine agurkus jungsim buferi
            $store = $this->store;//kintamojo perdavimas i views
            ob_start();
            include DIR.'/views/auginimas/listAuginimas.php';//liepsiu listau sugeneruoti nauja sarasa
            $out = ob_get_contents();//viskas subegs i buferi
            ob_end_clean();
            $json = ['listAuginimas' => $out];//issiusime agurku lista
            $response = new JsonResponse($json);
    
            $response->prepare(App::$request);
    
            return $response;
    }

        //auginam pomidorus
        public function augintiP()
        {
    
            $this->store->augintiPomidorus();
            
            //pasodine agurkus jungsim buferi
            $store = $this->store;//kintamojo perdavimas i views
            ob_start();
            include DIR.'/views/auginimas/listAuginimasP.php';//liepsiu listau sugeneruoti nauja sarasa
            $out = ob_get_contents();//viskas subegs i buferi
            ob_end_clean();
            $json = ['listAuginimasP' => $out];//issiusime agurku lista
            $response = new JsonResponse($json);
    
            $response->prepare(App::$request);
    
            return $response;
        }

        //auginam moliugus
        public function augintiM()
        {
            $this->store->augintiMoliugus();
            
            //pasodine agurkus jungsim buferi
            $store = $this->store;//kintamojo perdavimas i views
            ob_start();
            include DIR.'/views/auginimas/listAuginimasM.php';//liepsiu listau sugeneruoti nauja sarasa
            $out = ob_get_contents();//viskas subegs i buferi
            ob_end_clean();
            $json = ['listAuginimasM' => $out];//issiusime agurku lista
            $response = new JsonResponse($json);
    
            $response->prepare(App::$request);
    
            return $response;
        }
}