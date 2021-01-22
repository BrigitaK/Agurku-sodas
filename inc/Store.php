<?php

namespace Main;

interface Store
{

    // function getData();
    // function setData($data);
    function getNewId();
    function addNew(Agurkas $obj);
    function getAll();
    function remove($id);


}