<?php

define('DOOR_BELL', 'ring');
define('INSTALL_FOLDER', '/dashboard/agurkai/agurku-sodas/');
define('URL', 'http://localhost:8888/dashboard/agurkai/agurku-sodas/');
$uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
$uri = explode ('/', $uri);

include __DIR__.'/bootstrap.php';
include __DIR__ . '/vendor/autoload.php'; 

//router
if('sodinimas' == $uri[0]) {
    include __DIR__.'/sodinimas.php';
}
elseif('auginimas' == $uri[0]) {
    include __DIR__.'/auginimas.php';
}
elseif('skynimas' == $uri[0]) {
    include __DIR__.'/skynimas.php';
}
elseif('login' == $uri[0]) {
    include __DIR__.'/login.php';
}

$page = preg_replace('/[^\d]/', '', $_SERVER['REQUEST_URI']);