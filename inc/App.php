<?php 

namespace Main;

use Cucumber\Agurkas;
use Pumpkin\Moliugas;
use Tomato\Pomidoras;

class App {

    public static function session() {
        if(!isset($_SESSION['obj'])) {//jeigu nesetinta sesija. Gali buti nesetintas. Jei pirma karta ateini i puslapi, sitas masyvas bus tuscias.
            $_SESSION['obj'] = []; // sukuriam objektu masyva, laikysim agurku objektus
            $_SESSION['ID'] = 0; //kad agurkai nesikartotu yra naujas kintamasis
            $_SESSION['photo'] = '';
            $_SESSION['objP'] = []; // sukuriam objektu masyva, laikysim pomidoru objektus
            $_SESSION['objM'] = []; // sukuriam objektu masyva, laikysim moliugu objektus
        }
    }

    public static function sodintiAgurkus() {
        $agurkoObj = new Agurkas($_SESSION['ID']);//irasomas objektas, pasidarom nauja agurka
        // norint ideti objekta i sesija reikia paversti i stringa ir atgal atversti i objekta
        $_SESSION['obj'][]= serialize($agurkoObj); //irasom serializuota objekta paversta i stringa 
        $_SESSION['ID']++;
    }

    public static function sodintiMoliugus()
    {
        $moliugoObj = new Moliugas($_SESSION['ID']);
        $_SESSION['objM'][] = serialize($moliugoObj); //objektas paverstas i stringa
        $_SESSION['ID']++;
    }

    public static function sodintiPomidorus() 
    {
        $pomidoroObj = new Pomidoras($_SESSION['ID']);
        $_SESSION['objP'][] = serialize($pomidoroObj); //objektas paverstas i stringa
        $_SESSION['ID']++;
    }

    public static function sodintiVisasDarzoves() {
        $moliugoObj = new Moliugas($_SESSION['ID']);
        ++$_SESSION['ID'];
        $_SESSION['objM'][]= serialize($moliugoObj);
        $pomidoroObj = new Pomidoras($_SESSION['ID']);
        ++$_SESSION['ID'];
        $_SESSION['objP'][]= serialize($pomidoroObj);
        $agurkoObj = new Agurkas($_SESSION['ID']);
        ++$_SESSION['ID'];
        $_SESSION['obj'][]= serialize($agurkoObj);
    }

    public static function rautiAgurka(){
        foreach($_SESSION['obj'] as $index => $agurkas) {
            $agurkas = unserialize($agurkas);
            if ($_POST['rauti'] == $agurkas->id) {
                unset($_SESSION['obj'][$index]);
                App::redirect(sodinimas);
            }
        }
    }

    public static function rautiPomidora(){
        foreach($_SESSION['objP'] as $index => $pomidoras) {
            $pomidoras = unserialize($pomidoras);
            if ($_POST['rautiP'] == $pomidoras->id) {
                unset($_SESSION['objP'][$index]);
                App::redirect(sodinimas);
            }
        }
    }

    public static function rautiMoliuga(){
        foreach($_SESSION['objM'] as $index => $moliugas) {
            $moliugas = unserialize($moliugas);
            if ($_POST['rautiM'] == $moliugas->id) {
                unset($_SESSION['objM'][$index]);
                App::redirect(sodinimas);
            }
        }
    }

    public static function augintiAgurkus()
    {
            // scenarijus su objektiniais agurkais
        foreach($_SESSION['obj'] as $index => $agurkas) { // serializuotas stringas
            $agurkas = unserialize($agurkas); // agurku objektas
            $agurkas->add($_POST['kiekis'][$agurkas->id]); // pridedame agurko metodo skaiciavima
            $agurkas = serialize($agurkas); // vel verciame i stringa
            $_SESSION['obj'][$index] = $agurkas; // atgal uzsaugome i sesija agurkus
        }
    }

    public static function augintiPomidora(){
        foreach ($_SESSION['objP'] as $index => $pomidoras ) { 
            $pomidoras = unserialize($pomidoras); 
            $pomidoras->add($_POST['kiekis'][$pomidoras->id]);
            $pomidoras = serialize($pomidoras); 
            $_SESSION['objP'][$index] = $pomidoras; 
        }
        App::redirect(auginimas);
    }

    public static function augintiMoliuga(){
        foreach ($_SESSION['objM'] as $index => $moliugas ) { 
            $moliugas = unserialize($moliugas); 
            $moliugas->add($_POST['kiekis'][$moliugas->id]);
            $moliugas = serialize($moliugas); 
            $_SESSION['objM'][$index] = $moliugas; 
        }
        App::redirect(auginimas);
    }

    public static function augintiVisasDarzoves(){
        foreach ($_SESSION['objM'] as $index => $moliugas ) { 
            $moliugas = unserialize($moliugas); 
            $moliugas->add($_POST['kiekis'][$moliugas->id]);
            $moliugas = serialize($moliugas); 
            $_SESSION['objM'][$index] = $moliugas; 
        }
        foreach ($_SESSION['objP'] as $index => $pomidoras ) { 
            $pomidoras = unserialize($pomidoras); 
            $pomidoras->add($_POST['kiekis'][$pomidoras->id]);
            $pomidoras = serialize($pomidoras); 
            $_SESSION['objP'][$index] = $pomidoras; 
        }
        foreach ($_SESSION['obj'] as $index => $agurkas ) { 
            $agurkas = unserialize($agurkas); 
            $agurkas->add($_POST['kiekis'][$agurkas->id]);
            $agurkas = serialize($agurkas); 
            $_SESSION['obj'][$index] = $agurkas; 
        }
        App::redirect(auginimas);
    }

    public static function skintiAgurkus(){
        foreach ($_SESSION['obj'] as $index => $agurkas ) {
            $agurkas = unserialize($agurkas); // <----- agurko objektas
            $agurkas->skinti($_POST['kiekis'][$agurkas->id]); // <------- atimam agurka
            $agurkas = serialize($agurkas); // <------ vel stringas
            $_SESSION['obj'][$index] = $agurkas; // <----- uzsaugom agurkus
        }
        App::redirect(skynimas);
    }

    public static function skintiPomidorus(){
        foreach ($_SESSION['objP'] as $index => $pomidoras ) {
            $pomidoras = unserialize($pomidoras); // <----- agurko objektas
            $pomidoras->skinti($_POST['kiekis'][$pomidoras->id]); // <------- atimam agurka
            $pomidoras = serialize($pomidoras); // <------ vel stringas
            $_SESSION['objP'][$index] = $pomidoras; // <----- uzsaugom agurkus
        }
        App::redirect(skynimas);
    }

    public static function skintiMoliugus(){
        foreach ($_SESSION['objM'] as $index => $moliugas ) {
            $moliugas = unserialize($moliugas); // <----- agurko objektas
            $moliugas->skinti($_POST['kiekis'][$moliugas->id]); // <------- atimam agurka
            $moliugas = serialize($moliugas); // <------ vel stringas
            $_SESSION['objM'][$index] = $moliugas; // <----- uzsaugom agurkus
        }
        App::redirect(skynimas);
    }

    public static function skintiVisusAgurkus(){
        foreach ($_SESSION['obj'] as $index => $agurkas ) { // serializuotas stringas
            $agurkas = unserialize($agurkas); //agurko objektas
            if ($_POST['skinti-visus'] == $agurkas->id) {
                $agurkas->skintiVisus($_POST['skinti-visus'][$agurkas->id]);// atimam agurka
                $agurkas = serialize($agurkas); // vel stringas
                $_SESSION['obj'][$index] = $agurkas; // uzsaugom agurkus
            }
        }
        App::redirect(skynimas); 
    }

    public static function skintiVisusPomidorus(){
        foreach ($_SESSION['objP'] as $index => $pomidoras ) { // serializuotas stringas
            $pomidoras = unserialize($pomidoras); //agurko objektas
            if ($_POST['skinti-visusP'] == $pomidoras->id) {
                $pomidoras->skintiVisus($_POST['skinti-visusP'][$pomidoras->id]);// atimam agurka
                $pomidoras = serialize($pomidoras); // vel stringas
                $_SESSION['objP'][$index] = $pomidoras; // uzsaugom agurkus
            }
        }
        App::redirect(skynimas);
    }

    public static function skintiVisusMoliugus(){
        foreach ($_SESSION['objM'] as $index => $moliugas ) { // serializuotas stringas
            $moliugas = unserialize($moliugas); //agurko objektas
            if ($_POST['skinti-visusM'] == $moliugas->id) {
                $moliugas->skintiVisus($_POST['skinti-visusM'][$moliugas->id]);// atimam agurka
                $moliugas = serialize($moliugas); // vel stringas
                $_SESSION['objM'][$index] = $moliugas; // uzsaugom agurkus
            }
        }
        App::redirect(skynimas); 
    }

    public static function visuAgurkuNuskynimas(){
        foreach ($_SESSION['obj'] as $index => $agurkas ) { // serializuotas stringas
            $agurkas = unserialize($agurkas); //agurko objektas
            $agurkas->skintiVisus($_POST['skynimas'][$agurkas->id]);// atimam agurka
            $agurkas = serialize($agurkas); // vel stringas
            $_SESSION['obj'][$index] = $agurkas; // uzsaugom agurkus
        }
        App::redirect(skynimas); 
    }

    public static function visuPomidoruNuskynimas(){
        foreach ($_SESSION['objP'] as $index => $pomidoras ) { // serializuotas stringas
            $pomidoras = unserialize($pomidoras); //agurko objektas
            $pomidoras->skintiVisus($_POST['skynimas'][$pomidoras->id]);// atimam agurka
            $pomidoras = serialize($pomidoras); // vel stringas
            $_SESSION['objP'][$index] = $pomidoras; // uzsaugom agurkus
        }
        App::redirect(skynimas);
    }

    public static function visuMoliuguNuskynimas(){
        foreach ($_SESSION['objM'] as $index => $moliugas ) { // serializuotas stringas
            $moliugas = unserialize($moliugas); //agurko objektas
            $moliugas->skintiVisus($_POST['skynimas'][$moliugas->id]);// atimam agurka
            $moliugas = serialize($moliugas); // vel stringas
            $_SESSION['objM'][$index] = $moliugas; // uzsaugom agurkus
        }
        App::redirect(skynimas);
    }

    public static function visuDarzoviuNuskynimas(){
        foreach ($_SESSION['objM'] as $index => $moliugas ) { // serializuotas stringas
            $moliugas = unserialize($moliugas); //agurko objektas
            $moliugas->skintiVisus($_POST['skynimas'][$moliugas->id]);// atimam agurka
            $moliugas = serialize($moliugas); // vel stringas
            $_SESSION['objM'][$index] = $moliugas; // uzsaugom agurkus
        }
        foreach ($_SESSION['objP'] as $index => $pomidoras ) { // serializuotas stringas
            $pomidoras = unserialize($pomidoras); //agurko objektas
            $pomidoras->skintiVisus($_POST['skynimas'][$pomidoras->id]);// atimam agurka
            $pomidoras = serialize($pomidoras); // vel stringas
            $_SESSION['objP'][$index] = $pomidoras; // uzsaugom agurkus
        }
        foreach ($_SESSION['obj'] as $index => $agurkas ) { // serializuotas stringas
            $agurkas = unserialize($agurkas); //agurko objektas
            $agurkas->skintiVisus($_POST['skynimas'][$agurkas->id]);// atimam agurka
            $agurkas = serialize($agurkas); // vel stringas
            $_SESSION['obj'][$index] = $agurkas; // uzsaugom agurkus
        }
        App::redirect(skynimas);
    }

    public static function redirect($name) {
        header("Location: $name");
        die;
    }
}