<?php 

class Moliugas {

    private $id, $count, $photoM; 


    public function __construct($lastId)
    {
        $this->id = $lastId + 1;
        $this->count = 0;
        $photosM = array("./photo/moliugas.jpg", "./photo/moliugas1.jpg", "./photo/moliugas2.jpg");
        $this->photoM = $photosM[array_rand($photosM)];
    }

    public function __get($propertyName)
    {
        return $this->$propertyName; 
    }

    public function __set($propertyName, $value) 
    {
        $this->$propertyName = $value;
    }

    public function addMoliugas($moliugai)
    {
        $this->count = $this->count + $moliugai;
        
    }

    public function skintiMoliugus($moliugai)
    {
        
        if ( is_numeric($moliugai)){
        
            if($moliugai < 0) {
                $_SESSION['msg'] = 'Įveskite teigiamą skaičių.';
            } 
            else if ( floor($moliugai) != $moliugai){
                $_SESSION['msg'] = 'Įveskite sveiką skaičių.';
            }


            else if ($this->count < $moliugai){
                $_SESSION['ERROR'] = 'Įvestas skaičius per didelis, tiek agurkų nėra.';
            }
            else if ( $this->count >= $moliugai){
                $this->count -= $moliugai;
            }
        }

    }

    public function skintiVisus($moliugai)
    {

        $this->count = 0;
    }

    //visai nebutina
   // public function __serialize() //iskvieciamas kai objektas yra serializuojamas
   // {
        
   // }
}

