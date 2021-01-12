<?php 

namespace Main;


class App {

    public static function route() {

        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
        $uri = explode ('/', $uri);

        if('sodinimas' == $uri[0]) {
            include DIR.'/sodinimas.php';
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
    }

    public static function redirect($url)
    {
        header('Location: '.URL.$url);
        exit;
    }
}