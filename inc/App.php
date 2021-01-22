<?php 

namespace Main;

use Main\Controllers\SodinimasController;
use Main\Controllers\AuginimasController;
use Main\Controllers\SkynimasController;
use Symfony\Component\HttpFoundation\Request;

class App {

    public static $request;

    public static function start()
    {
        self::$request = Request::createFromGlobals();
    
        return self::route();
    }

    public static function route() {

        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
        $uri = explode ('/', $uri);

        if('sodinimas' == $uri[0]) {
            if(!isset($uri[1])) {
                return (new SodinimasController)->index();
            }
            if('list' == $uri[1]) {
            return (new SodinimasController)->list();
            }
            if('rauti' == $uri[1]) {
                return (new SodinimasController)->rauti();
            }
            if('sodintiA' == $uri[1]) {
                return (new SodinimasController)->sodintiA();
            }
            if('listM' == $uri[1]) {
                return (new SodinimasController)->listM();
            }
            if('rautiM' == $uri[1]) {
                return (new SodinimasController)->rautiM();
            }
            if('sodintiM' == $uri[1]) {
                return (new SodinimasController)->sodintiM();
            }
            if('listP' == $uri[1]) {
                return (new SodinimasController)->listP();
            }
            if('rautiP' == $uri[1]) {
                return (new SodinimasController)->rautiP();
            }
            if('sodintiP' == $uri[1]) {
                return (new SodinimasController)->sodintiP();
            }
            if('listV' == $uri[1]) {
                return (new SodinimasController)->listV();
            }
            if('sodintiV' == $uri[1]) {
                return (new SodinimasController)->sodintiV();
            }
            //gera vieta prideti 404 psl

        }
        elseif('auginimas' == $uri[0]) {
            if(!isset($uri[1])) {
                return (new AuginimasController)->index();
            }
            if('listAuginimas' == $uri[1]) {
            return (new AuginimasController)->listAuginimas();
            }
            if('listAuginimasM' == $uri[1]) {
                return (new AuginimasController)->listAuginimasM();
            }
            if('listAuginimasP' == $uri[1]) {
                return (new AuginimasController)->listAuginimasP();
            }
            if('auginti' == $uri[1]) {
                return (new AuginimasController)->auginti();
            }
            if('augintiM' == $uri[1]) {
                return (new AuginimasController)->augintiM();
            }
            if('augintiP' == $uri[1]) {
                return (new AuginimasController)->augintiP();
            }

            //gera vieta prideti 404 psl

        }
        elseif('skynimas' == $uri[0]) {
            if(!isset($uri[1])) {
                return (new SkynimasController)->index();
            }
            if('listSkynimas' == $uri[1]) {
            return (new SkynimasController)->listSkynimas();
            }
            if('listSkynimasM' == $uri[1]) {
                return (new SkynimasController)->listSkynimasM();
            }
            if('listSkynimasP' == $uri[1]) {
                return (new SkynimasController)->listSkynimasP();
            }
            if('skintiA' == $uri[1]) {
                return (new SkynimasController)->skintiA();
            }
            if('skintiM' == $uri[1]) {
                return (new SkynimasController)->skintiM();
            }
            if('skintiP' == $uri[1]) {
                return (new SkynimasController)->skintiP();
            }
            if('skintiVisusA' == $uri[1]) {
                return (new SkynimasController)->skintiVisusA();
            }
            if('skintiVisusP' == $uri[1]) {
                return (new SkynimasController)->skintiVisusP();
            }
            if('skintiVisusM' == $uri[1]) {
                return (new SkynimasController)->skintiVisusM();
            }
            if('skynimas' == $uri[1]) {
                return (new SkynimasController)->skynimas();
            }
            if('skynimasM' == $uri[1]) {
                return (new SkynimasController)->skynimasM();
            }
            if('skynimasP' == $uri[1]) {
                return (new SkynimasController)->skynimasP();
            }
            if('skynimasV' == $uri[1]) {
                return (new SkynimasController)->skynimasV();
            }

            //gera vieta prideti 404 psl

        }
        elseif('login' == $uri[0]) {
            include DIR.'/login.php';
        }
        elseif('login' == $uri[0] && 'logout' == $uri[1]) {
            include DIR.'/login.php';
        }
    }

    public static function redirect($url)
    {
        header('Location: '.URL.$url);
        exit;
    }
}