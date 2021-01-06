<?php 

class App {

    function redirect($name) {
        header("Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/$name.php");
        die;
    }
}