<?php 

namespace Main;

use Main\Controllers\SodinimasController;

class App {

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