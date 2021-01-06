<?php 

class App {

    public static function session() {
        if(!isset($_SESSION['a'])) {//jeigu nesetinta sesija. Gali buti nesetintas. Jei pirma karta ateini i puslapi, sitas masyvas bus tuscias.
            $_SESSION['a'] = [];
            $_SESSION['obj'] = []; // sukuriam objektu masyva, laikysim agurku objektus
            $_SESSION['agurku ID'] = 0; //kad agurkai nesikartotu yra naujas kintamasis
            $_SESSION['photo'] = '';
        
            $_SESSION['objP'] = []; // sukuriam objektu masyva, laikysim pomidoru objektus
            $_SESSION['pomidoru ID'] = 0; //kad pomidorai nesikartotu yra naujas kintamasis
            $_SESSION['photo'] = '';
        
            $_SESSION['objM'] = []; // sukuriam objektu masyva, laikysim pomidoru objektus
            $_SESSION['moliugu ID'] = 0; //kad pomidorai nesikartotu yra naujas kintamasis
            $_SESSION['photo'] = '';
        }
    }

    public static function sodintiAgurka() {
        $agurkoObj = new Agurkas($_SESSION['agurku ID']);//irasomas objektas, pasidarom nauja agurka
        $_SESSION['agurku ID']++;
        // norint ideti objekta i sesija reikia paversti i stringa ir atgal atversti i objekta
        $_SESSION['obj'][]= serialize($agurkoObj); //irasom serializuota objekta paversta i stringa
        App::redirect(sodinimas);
    }

    public static function sodintiPomidora() {
        $pomidoroObj = new Pomidoras($_SESSION['pomidoru ID']);
        ++$_SESSION['pomidoru ID'];
        $_SESSION['objP'][]= serialize($pomidoroObj);
        App::redirect(sodinimas);
    }

    public static function sodintiMoliuga() {
        $moliugoObj = new Moliugas($_SESSION['moliugu ID']);
        ++$_SESSION['moliugu ID'];
        $_SESSION['objM'][]= serialize($moliugoObj);
        App::redirect(sodinimas);
    }

    public static function sodintiVisasDarzoves() {
        $moliugoObj = new Moliugas($_SESSION['moliugu ID']);
        ++$_SESSION['moliugu ID'];
        $_SESSION['objM'][]= serialize($moliugoObj);
        $pomidoroObj = new Pomidoras($_SESSION['pomidoru ID']);
        ++$_SESSION['pomidoru ID'];
        $_SESSION['objP'][]= serialize($pomidoroObj);
        $agurkoObj = new Agurkas($_SESSION['agurku ID']);
        ++$_SESSION['agurku ID'];
        $_SESSION['obj'][]= serialize($agurkoObj);
        App::redirect(sodinimas);
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

    public static function augintiAgurka(){
        foreach ($_SESSION['obj'] as $index => $agurkas ) { // serializuotas stringas
            $agurkas = unserialize($agurkas); //agurko objektas
            $agurkas->add($_POST['kiekis'][$agurkas->id]);// pridedam agurka
            $agurkas = serialize($agurkas); // vel stringas
            $_SESSION['obj'][$index] = $agurkas; // uzsaugom agur
        }
        App::redirect(auginimas);
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

    }

    public static function redirect($name) {
        header("Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/$name.php");
        die;
    }
}