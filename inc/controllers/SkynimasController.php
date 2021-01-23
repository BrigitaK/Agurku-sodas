<?php


namespace Main\Controllers;
use Main\App, Main\Store, Main\Agurkas, Main\Pomidoras, Main\Moliugas;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class SkynimasController {

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

     //skynimo puslapio rodymo scenarijus
     public function index()
     {
         $response = new Response(
             'Content',
             200,
             ['content-type' => 'text/html']
         );
         ob_start();
         include DIR.'/views/skynimas/index.php';
         $out = ob_get_contents();
         ob_end_clean();
         
         $response->setContent($out);
         $response->prepare(App::$request);
 
         return $response;
         
     }

    //listo scenarijus
    public function listSkynimas()
    {
        $store = $this->store;//kintamojo perdavimas i views
            ob_start();
            include DIR.'/views/skynimas/listSkynimas.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['listSkynimas' => $out];
            $response = new JsonResponse($json);
    
            $response->prepare(App::$request);
    
            return $response;
        
    }

    public function listSkynimasM()
    {
        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/skynimas/listSkynimasM.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listSkynimasM' => $out];
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
    
    }

    public function listSkynimasP()
    {
        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/skynimas/listSkynimasP.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listSkynimasP' => $out];
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
    }

    //skynimo Agurku scenarijus
    public function skintiA()
    {
        $kiekis = (int) $this->rawData['kiek-skinti'];
        $this->store->skintiAgurkus($this->rawData['id'], $kiekis);
        ob_start();
        $store = $this->store;
        include DIR.'/views/skynimas/listSkynimas.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listSkynimas' => $out];
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
    }

    //skynimo Pomidoru scenarijus
    public function skintiP()
    {
        $this->store->skintiPomidorus();
        App::redirect(skynimas);
    }

    //skynimo moliugu scenarijus
    public function skintiM()
    {
        $this->store->skintiMoliugus();
        App::redirect(skynimas);
    }

    //skynimo Agurku scenarijus 
    public function skintiVisusA()
    {
        $this->store->skintiVisusAgurkus($this->rawData['id']);
        ob_start();
        $store = $this->store;
        include DIR.'/views/skynimas/listSkynimas.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listSkynimas' => $out];
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
    }

    //skynimo Pomidoru scenarijus 
    public function skintiVisusP()
    {
        $this->store->skintiVisusPomidorus();
        App::redirect(skynimas);
    }

    //skynimo moliugu scenarijus 
    public function skintiVisusM()
    {
        $this->store->skintiVisusMoliugus();
        App::redirect(skynimas);
    }
    //visu agurku nuskynimas
    public function skynimas()
    {
        $this->store->visuAgurkuNuskynimas();
        ob_start();
        $store = $this->store;
        include DIR.'/views/skynimas/listSkynimas.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listSkynimas' => $out];
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
    }

    //visu pomidoru nuskynimas
    public function skynimasP()
    {
        $this->store->visuPomdoruNuskynimas();
        ob_start();
        $store = $this->store;
        include DIR.'/views/skynimas/listSkynimasP.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listSkynimasP' => $out];
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
    }

    //visu moliugu nuskynimas
    public function skynimasM()
    {
        $this->store->visuMoliuguNuskynimas();
        ob_start();
        $store = $this->store;
        include DIR.'/views/skynimas/listSkynimasM.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listSkynimasM' => $out];
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
    }

    //visu darzoviu nuskynimas
    public function skynimasV()
    {
        $this->store->visuAgurkuNuskynimas();
        $this->store->visuPomidoruNuskynimas();
        $this->store->visuMoliuguNuskynimas();
        ob_start();
        $store = $this->store;
        include DIR.'/views/skynimas/listSkynimas.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listSkynimas' => $out];
        $response = new JsonResponse($json);
    
        $response->prepare(App::$request);

        return $response;
    }
}
