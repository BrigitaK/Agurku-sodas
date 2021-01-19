<?php


namespace Main\Controllers;
use Main\App, Main\Store, Main\Agurkas, Main\Pomidoras, Main\Moliugas;

class SkynimasController {

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

     //skynimo puslapio rodymo scenarijus
     public function index()
     {
         include DIR.'/views/skynimas/index.php';
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
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(200);
            echo $json;
            die;
        
    }

    public function listSkynimasM()
    {
        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/skynimas/listSkynimasM.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listSkynimasM' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    
    }

    public function listSkynimasP()
    {
        $store = $this->store;//kintamojo perdavimas i views
        ob_start();
        include DIR.'/views/skynimas/listSkynimasP.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['listSkynimasP' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    
    }

    //skynimo Agurku scenarijus
    public function skintiA()
    {
        $this->store->skintiAgurkus();
        App::redirect(skynimas);
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
        $this->store->skintiVisusAgurkus();
        App::redirect(skynimas);
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
        App::redirect(skynimas);
    }

    //visu pomidoru nuskynimas
    public function skynimasP()
    {
        $this->store->visuPomidoruNuskynimas();
        App::redirect(skynimas);
    }

    //visu moliugu nuskynimas
    public function skynimasM()
    {
        $this->store->visuMoliuguNuskynimas();
        App::redirect(skynimas);
    }

    //visu darzoviu nuskynimas
    public function skynimasV()
    {
        $this->store->visuAgurkuNuskynimas();
        $this->store->visuPomidoruNuskynimas();
        $this->store->visuMoliuguNuskynimas();
        App::redirect(skynimas);
    }
}
