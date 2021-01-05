<?php 

class Agurkas {

    private $id, $count, $photo; //jei du kintamieji turi ta pati matomuma, galima rasyti per kableli


    public function __construct($lastId)
    {
        $this->id = $lastId + 1;
        $this->count = 0;
        $photos = array("./photo/agurkas.jpg", "./photo/agurkas1.jpg", "./photo/agurkas2.jpg");
        $this->photo = $photos[array_rand($photos)];



        //$agurkoObj->photo = $photos[array_rand($photos)]; //objekto foto
        // $agurkoObj->id = $_SESSION['agurku ID'] +1; 
        //$agurkoObj->count = 0; // objekto count //perkeliam abi eilutes is sodinimo
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

    //visai nebutina
   // public function __serialize() //iskvieciamas kai objektas yra serializuojamas
   // {
        
   // }
}

