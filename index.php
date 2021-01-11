<?php

define('DOOR_BELL', 'ring');
define('INSTALL_FOLDER', '/dashboard/agurkai/agurku-sodas/');
$uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
$uri = explode ('/', $uri);

include __DIR__.'/bootstrap.php';

include __DIR__ . '/vendor/autoload.php'; 

//router
if('sodinimas' == $uri[0]) {
    include __DIR__.'/sodinimas.php';
}
if('auginimas' == $uri[1]) {
    include __DIR__.'/auginimas.php';
}
if('skynimas' == $uri[2]) {
    include __DIR__.'/skynimas.php';
}

//_d($uri);
$page = preg_replace('/[^\d]/', '', $_SERVER['REQUEST_URI']);