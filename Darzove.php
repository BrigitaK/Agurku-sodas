<?php 

class Darzove {

    public $id, $count, $photo; 


    public function __construct($lastId)
    {
    
    }

    public function __get($propertyName) 
    {
        return $this->$propertyName;
    }

    public function __set($propertyName, $value)
    {
        $this->$propertyName = $value; 
    }

    public function add($darzoves)
    {
        $this->count = $this->count + $darzoves;
        
    }

    public function skinti($darzoves)
    {
        
        if ( is_numeric($darzoves)){
        
            if($darzoves < 0) {
                $_SESSION['msg'] = 'Įveskite teigiamą skaičių.';
            } 
            else if ( floor($darzoves) != $darzoves){
                $_SESSION['msg'] = 'Įveskite sveiką skaičių.';
            }


            else if ($this->count < $darzoves){
                $_SESSION['ERROR'] = 'Įvestas skaičius per didelis, tiek nėra.';
            }
            else if ( $this->count >= $darzoves){
                $this->count -= $darzoves;
            }
        }

    }

    public function skintiVisus($darzoves)
    {

        $this->count = 0;
    }
    function redirect($name) {
        header("Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/$name.php");
        die;
    }
}

