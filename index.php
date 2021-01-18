<?php
use Main\App;

define('DOOR_BELL', 'ring');
define('INSTALL_FOLDER', '/dashboard/agurkai/agurku-sodas/');
define('URL', 'http://localhost:8888/dashboard/agurkai/agurku-sodas/');
define('DIR', __DIR__);

include __DIR__.'/bootstrap.php';

//App::start();
App::route();

