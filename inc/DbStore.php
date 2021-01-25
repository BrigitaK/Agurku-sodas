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
                $obj->kiekAugti = $row['kiekAugti'];
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
       WHERE id = ?;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function removeM($id)
    {
        $sql = "DELETE FROM darzove
        WHERE id = ?;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function removeP($id)
    {
        $sql = "DELETE FROM darzove
        WHERE id = ?;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function augintiAgurkus()
    { 
        foreach ($this->getAll() as $k => $obj) {
            $obj->add($obj->auga());
            $sql = "UPDATE darzove
            SET count = $obj->count, 
            kiekAugti = $obj->kiekAugti
            WHERE id = $obj->id ; ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
    }
    public function augintiPomidorus()
    { 
        foreach ($this->getAllP() as $k => $objP) {
            $objP->add($objP->auga());
            $sql = "UPDATE darzove
            SET count = $objP->count, 
            kiekAugti = $objP->kiekAugti
            WHERE id = $objP->id ; ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
    }
    public function augintiMoliugus()
    { 
        foreach ($this->getAllM() as $k => $objM) {
            $objM->add($objM->auga());
            $sql = "UPDATE darzove
            SET count = $objM->count, 
            kiekAugti = $objM->kiekAugti
            WHERE id = $objM->id ; ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
    }

    public function skintiAgurkus($id, $kiek)
    {
        foreach ($this->getAll() as $k => $obj) {
            if ($obj->id == $id) {
                $obj->skinti($kiek);


                $sql = "UPDATE darzove
                SET count = ?
                WHERE id = ? ; ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$obj->count, $id]);
            }
        }
    }

    public function skintiMoliugus($id, $kiek)
    {
        foreach ($this->getAllM() as $k => $objM) {
            if ($objM->id == $id) {
                $objM->skinti($kiek);


                $sql = "UPDATE darzove
                SET count = ?
                WHERE id = ? ; ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$objM->count, $id]);
            }
        }
    }

    public function skintiPomidorus($id, $kiek)
    {
        foreach ($this->getAllP() as $k => $objP) {
            if ($objP->id == $id) {
                $objP->skinti($kiek);


                $sql = "UPDATE darzove
                SET count = ?
                WHERE id = ? ; ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$objP->count, $id]);
            }
        }
    }

    public function skintiVisusAgurkus($id)
    {
        foreach ($this->getAll() as $k => $obj) {
            if ($obj->id == $id) {
                $obj->skintiVisus();

                $sql = "UPDATE darzove
                SET count = ?
                WHERE id = ? ; ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$obj->count, $id]);
            }
        }
    }

    public function skintiVisusMoliugus($id)
    {
        foreach ($this->getAllM() as $k => $objM) {
            if ($objM->id == $id) {
                $objM->skintiVisus();

                $sql = "UPDATE darzove
                SET count = ?
                WHERE id = ? ; ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$objM->count, $id]);
            }
        }
    }

    public function skintiVisusPomidorus($id)
    {
        foreach ($this->getAllP() as $k => $objP) {
            if ($objP->id == $id) {
                $objP->skintiVisus();

                $sql = "UPDATE darzove
                SET count = ?
                WHERE id = ? ; ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$objP->count, $id]);
            }
        }
    }

    public function visuAgurkuNuskynimas()
        {
            foreach ($this->getAll() as $k => $obj) {
                $obj->skintiVisus();
    
                $sql = "UPDATE darzove
                SET `count` = '$obj->count'
                WHERE `id`='$obj->id';";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }
        }

        public function visuMoliuguNuskynimas()
        {
            foreach ($this->getAllM() as $k => $objM) {
                $objM->skintiVisus();
    
                $sql = "UPDATE darzove
                SET `count` = '$objM->count'
                WHERE `id`='$objM->id';";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }
        }

        public function visuPomidoruNuskynimas()
        {
            foreach ($this->getAllP() as $k => $objP) {
                $objP->skintiVisus();
    
                $sql = "UPDATE darzove
                SET `count` = '$objP->count'
                WHERE `id`='$objP->id';";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }
        }

}