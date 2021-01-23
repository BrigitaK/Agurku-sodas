<?php

namespace Main;


use PDO;

class DbStore implements Store{

    private $pdo;

    public function __construct($o=null)
    {
        $host = 'localhost';
        $db   = 'darzoviu_baze';
        $user = 'test';
        $pass = '123456';
        $charset = 'utf8mb4';
        
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
             
        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    public function getAll()
    {
        //SKAITYMAS
        $sql = "SELECT * FROM darzove
        ;";
        $stmt = $this->pdo->query($sql); // saugi

        $agurkuMasyvas = [];
        while ($row = $stmt->fetch())
        {
            if ('.agurkas.' == $row['type']) {
                $obj = new Agurkas($row['id']);
                $obj->id = $row['id'];
                $obj->count = $row['count'];
                $obj->type = $row['type'];
                $agurkuMasyvas[] = $obj;
            }
        }
        return $agurkuMasyvas;

    }

    public function getAllM()
    {
        //SKAITYMAS
        $sql = "SELECT * FROM darzove
        ;";
        $stmt = $this->pdo->query($sql); // saugi

        $moliuguMasyvas = [];
        while ($row = $stmt->fetch())
        {
            if ('.moliugas.' == $row['type']) {
                $objM = new Moliugas($row['id']);

            $objM->id = $row['id'];
            $objM->count = $row['count'];
            $objM->type = $row['type'];
            $objM->price = $row['price'];
            $moliuguMasyvas[] = $objM;
                    
            }
        }
        return $moliuguMasyvas;

    }
    public function getAllP()
    {
        //SKAITYMAS
        $sql = "SELECT * FROM darzove
        ;";
        $stmt = $this->pdo->query($sql); // saugi

        $pomidoruMasyvas = [];
        while ($row = $stmt->fetch())
        {
            if ('.pomidoras.' == $row['type']) {
                $objP = new Pomidoras($row['id']);
                $objP->id = $row['id'];
                $objP->count = $row['count'];
                $objP->type = $row['type'];
                $objP->price = $row['price'];
                $pomidoruMasyvas[] = $objP;
            }
        }
        return $pomidoruMasyvas;

    }

    public function getNewId()
    {
        return null;
    }

    public function addNew(Agurkas $obj)
    {
        $sql = "INSERT INTO darzove (`count`, `type`, `price`)
        VALUES ('.$obj->count.', '.$obj->type.', '.$obj->priceE.');";
        $this->pdo->query($sql);
    }
    public function addNewM(Moliugas $objM)//objektas 
    {
        $sql = "INSERT INTO darzove (`count`, `type`, `price`)
        VALUES ('.$objM->count.', '.$objM->type.', '.$objM->priceE.');";
        $this->pdo->query($sql);
    }

    public function addNewP(Pomidoras $objP)//objektas 
    {
        $sql = "INSERT INTO darzove (`count`, `type`, `price`)
        VALUES ('.$objP->count.', '.$objP->type.', '.$objP->priceE.');";
        $this->pdo->query($sql);
    }


    public function remove($id)
    {
        $sql = "DELETE FROM darzove
        WHERE id='".$id."';";
        $this->pdo->query($sql); // <--- NESAUGU!!!!!!!!!
    }

    public function removeM($id)
    {
        $sql = "DELETE FROM darzove
        WHERE id='".$id."';";
        $this->pdo->query($sql); // <--- NESAUGU!!!!!!!!!
    }

    public function removeP($id)
    {
        $sql = "DELETE FROM darzove
        WHERE id='".$id."';";
        $this->pdo->query($sql); // <--- NESAUGU!!!!!!!!!
    }


    public function augintiAgurkus()
    { 

        $sql = "UPDATE darzove
        SET count=$kiek
        WHERE `type`='.agurkas.';";
        //siunciam i db
        $this->pdo->query($sql);
    }
    // public function augintiPomidorus()
    // {
    //     
        // foreach($this->data['objP'] as $index => $obj)
        // {
        //     $obj = unserialize($obj); 
        //     $obj->add($obj->kiekAugti);
        //     $obj->auga();
        //     $obj = serialize($obj); 
        //     $this->data['objP'][$index] = $obj;
        // }
    // }
    // public function augintiMoliugus()
    // {
    //     foreach($this->data['objM'] as $index => $obj)
    //     {
    //         $obj = unserialize($obj); 
    //         $obj->add($obj->auga());
    //         $obj = serialize($obj); 
    //         $this->data['objM'][$index] = $obj;
    //     }
    // }

    // public function skintiAgurkus()
    // {
    //     foreach($this->data['obj'] as $index => $obj){
    //         $obj = unserialize($obj); 
    //         $obj->skinti($_POST['kiekis'][$obj->id]);
    //         $obj = serialize($obj); 
    //         $this->data['obj'][$index] = $obj;
    //     }
    // }
    // public function skintiPomidorus()
    // {
    //     foreach($this->data['objP'] as $index => $obj){
    //         $obj = unserialize($obj); 
    //         $obj->skinti($_POST['kiekis'][$obj->id]);
    //         $obj = serialize($obj); 
    //         $this->data['objP'][$index] = $obj;
    //     }
    // }
    // public function skintiMoliugus()
    // {
    //     foreach($this->data['objM'] as $index => $obj){
    //         $obj = unserialize($obj); 
    //         $obj->skinti($_POST['kiekis'][$obj->id]);
    //         $obj = serialize($obj); 
    //         $this->data['objM'][$index] = $obj;
    //     }
    // }

    // public function skintiVisusAgurkus(){
    //     foreach($this->data['obj'] as $index => $obj){
    //         $obj = unserialize($obj); 
    //         if ($_POST['skinti-visus'] == $obj->id) {
    //             $obj->skintiVisus($_POST['skinti-visus'][$obj->id]);
    //             $obj = serialize($obj); 
    //             $this->data['obj'][$index] = $obj; 
    //         }
    //     }
    // }

    // public function skintiVisusPomidorus(){
    //     foreach($this->data['objP'] as $index => $obj){
    //         $obj = unserialize($obj); 
    //         if ($_POST['skinti-visusP'] == $obj->id) {
    //             $obj->skintiVisus($_POST['skinti-visus'][$obj->id]);
    //             $obj = serialize($obj); 
    //             $this->data['objP'][$index] = $obj; 
    //         }
    //     }
    // }

    // public function skintiVisusMoliugus(){
    //     foreach($this->data['objM'] as $index => $obj){
    //         $obj = unserialize($obj); 
    //         if ($_POST['skinti-visusM'] == $obj->id) {
    //             $obj->skintiVisus($_POST['skinti-visus'][$obj->id]);
    //             $obj = serialize($obj); 
    //             $this->data['objM'][$index] = $obj; 
    //         }
    //     }
    // }

    // public function visuAgurkuNuskynimas(){
    //     foreach($this->data['obj'] as $index => $obj){
    //         $obj = unserialize($obj); 
    //         $obj->skintiVisus($_POST['skynimas'][$obj->id]);// atimam agurka
    //         $obj = serialize($obj); // vel stringas
    //         $this->data['obj'][$index] = $obj; // uzsaugom agurkus
    //     }
    // }

    // public function visuPomidoruNuskynimas(){
    //     foreach($this->data['objP'] as $index => $obj){
    //         $obj = unserialize($obj); 
    //         $obj->skintiVisus($_POST['skynimasP'][$obj->id]);// atimam agurka
    //         $obj = serialize($obj); // vel stringas
    //         $this->data['objP'][$index] = $obj; // uzsaugom agurkus
    //     }
    // }
    // public function visuMoliuguNuskynimas(){
    //     foreach($this->data['objM'] as $index => $obj){
    //         $obj = unserialize($obj); 
    //         $obj->skintiVisus($_POST['skynimasM'][$obj->id]);// atimam agurka
    //         $obj = serialize($obj); // vel stringas
    //         $this->data['objM'][$index] = $obj; // uzsaugom agurkus
    //     }
    // }




}