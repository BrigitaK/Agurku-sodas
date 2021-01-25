<?php

namespace Main;

use Main\Agurkas;
use Main\Moliugas;
use Main\Pomidoras;

interface Store
{

    // function getData();
    // function setData($data);
    function getNewId();
    function addNew(Agurkas $obj);
    function addNewM(Moliugas $objM);
    function addNewP(Pomidoras $objP);
    function getAll();
    function getAllM(); 
    function getAllP();
    function remove($id);
    function removeM($id);
    function removeP($id);
    function augintiAgurkus();
    function augintiPomidorus();
    function augintiMoliugus();
    // function skintiAgurkus($id, $kiek);
    // function skintiMoliugus($id, $kiek);
    // function skintiPomidorus($id, $kiek);


}