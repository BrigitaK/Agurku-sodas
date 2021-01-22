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
             
        $this->$pdo = new PDO($dsn, $user, $pass, $options);
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
            if ('agurkas' == $row['type']) {
                $objA = new Agurkas($row['id']);
            }
            $objA->id = $row['id'];
            $objA->count = $row['count'];
            $objA->type = $row['type'];
            $objA->price = $row['price'];
            $agurkuMasyvas[] = $objA;
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
            if ('moliugas' == $row['type']) {
                $objA = new Moliugas($row['id']);
            }
            $objA->id = $row['id'];
            $objA->count = $row['count'];
            $objA->type = $row['type'];
            $objA->price = $row['price'];
            $moliuguMasyvas[] = $objM;
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
            if ('moliugas' == $row['type']) {
                $objA = new Moliugas($row['id']);
            }
            $objA->id = $row['id'];
            $objA->count = $row['count'];
            $objA->type = $row['type'];
            $objA->price = $row['price'];
            $pomidoruMasyvas[] = $objP;
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
        VALUES ('.$objA->count.', 'agurkas');";
        $this->pdo->query($sql);
    }
    public function addNewM(Moliugas $obj)//objektas 
    {
        $sql = "INSERT INTO darzove (`count`, `type`, `price`)
        VALUES ('.$objM->count.', 'moliugas');";
        $this->pdo->query($sql);
    }

    public function addNewP(Pomidoras $obj)//objektas 
    {
        $sql = "INSERT INTO darzove (`count`, `type`, `price`)
        VALUES ('.$objP->count.', 'pomidoras');";
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

    // public function augintiAgurkus()
    // {
    //     foreach($this->data['obj'] as $index => $obj)
    //     {
    //         $obj = unserialize($obj); 
    //         $obj->add($obj->auga());
    //         $obj = serialize($obj); 
    //         $this->data['obj'][$index] = $obj;
    //     }
    // }
    // public function augintiPomidorus()
    // {
    //     foreach($this->data['objP'] as $index => $obj)
    //     {
    //         $obj = unserialize($obj); 
    //         $obj->add($obj->auga());
    //         $obj = serialize($obj); 
    //         $this->data['objP'][$index] = $obj;
    //     }
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