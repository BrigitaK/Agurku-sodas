<?php

session_start();

defined('DOOR_BELL') || die('Priėjimas nepasiekiamas');

include __DIR__ . '/vendor/autoload.php'; // <-------- autoloadiname vendoriaus faila

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    Main\App::redirect(login);
}