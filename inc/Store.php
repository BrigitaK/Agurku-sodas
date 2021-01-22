<?php

namespace Main;

interface Store
{

    // function getData();
    // function setData($data);
    function getNewId();
    function addNew(Agurkas $objA);
    function addNewM(Moliugas $objM);
    function addNewP(Moliugas $objP);
    function getAll();
    function getAllP();
    function getAllM(); 
    function remove($id);
    function removeM($id);
    function removeP($id);


}