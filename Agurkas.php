<?php 

class Agurkas {

    private $id, $count; //jei du kintamieji turi ta pati matomuma, galima rasyti per kableli


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

    }
}

