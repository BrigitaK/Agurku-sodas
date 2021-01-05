<?php 

class Pomidoras {


    private $id, $count, $photoP; //jei du kintamieji turi ta pati matomuma, galima rasyti per kableli



    public function __construct($lastId)
    {
        $this->id = $lastId + 1;
        $this->count = 0;
        $photosP = array("./photo/pomidoras.jpg", "./photo/pomidoras1.jpg", "./photo/pomidoras2.jpg");
        $this->photoP = $photosP[array_rand($photosP)];



        //$agurkoObj->photo = $photos[array_rand($photos)]; //objekto foto
        // $agurkoObj->id = $_SESSION['agurku ID'] +1; 
        //$agurkoObj->count = 0; // objekto count //perkeliam sias eilutes is sodinimo
    }

    public function __get($propertyName) // getas turi viena argumenta, varda tos savybes i kuria mes kreipiames
    //jeigu kreipsiuosi i agurko id, tai pasileis ir propertyName bus id
    {
        //uzpildom vidu // geteris nieko nedaro su paciom reiksmem
        //norint irasyti ka nors i id, reikia aprasyti eiga
        return $this->$propertyName; // kreipiuosi i agurko objekta ir bandau nuskaityti id
    }


    //norint kazka irasyti i id ir count reikia seterio
    public function __set($propertyName, $value) //pirmas savybes vardas, antras reiksme kuria bandau irasyti
    //panasiai kaip ir get, seteris pasileidzia tuo metu kai as bandau irasyti savybe kurios nera arba kuri yra uz matomumo ribu
    {
        //irasom ir mato privatu matomuma
        $this->$propertyName = $value; //$propertyName kreipiuosi i kintamojo savybem kuri yra uzkoduota $propertyName, ir buna id = $value ir kitu atveju count = $value, 
                                        //propertyName tai savybe ir butu visiskai pazodziui isversta ir butu kaip public propertyName
    }

    public function addPomidoras($pomidorai)
    {
        $this->count = $this->count + $pomidorai;
        
    }

    public function skintiPomidorus($pomidorai)
    {
        $this->count = $this->count - $_POST['kiekis'][$pomidoras->id];
    }

    public function skintiVisusPomidorus($pomidorai)
    {

        $this->count = 0;
    }


    //visai nebutina
   // public function __serialize() //iskvieciamas kai objektas yra serializuojamas
   // {
        
   // }
}

