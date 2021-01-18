<?php 

namespace Main;

use Symfony\Component\HttpFoundation\Exception;
use Main\Controllers\SodinimasController;

class App {

    public static $request;

    public static function start() {
        self::$request = Request::createFromGlobals();
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
            include DIR.'/auginimas.php';
        }
        elseif('skynimas' == $uri[0]) {
            include DIR.'/skynimas.php';
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