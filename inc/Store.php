<?php

namespace Main;

class Store {

    private const PATH = DIR.'/duomenys/';
    private $fileName = 'main';
    private $duomenys;

    public function __construct($file) 
    {
        $this->fileName = $file;
        if(!file_exists(self::PATH.$this->fileName.'.json')) {
            file_put_contents(self::PATH.$this->fileName.'.json', json_encode(['obj' => [], 'objP' => [], 'objM' => [],'ID' => 0, 'photo' => '' ]));//pradinis masyvas
            $this->duomenys = ['obj' => [], 'objP' => [], 'objM' => [],'ID' => 0, 'photo' => '' ];
        }
        else {
            $this->duomenys = file_get_contents(self::PATH.$this->fileName.'.json');
            $this->duomenys = json_decode($this->duomenys,1);
        }
    }

    public function _destruct() 
    {
        file_put_contents(self::PATH.$this->fileName.'.json', json_encode($this->duomenys));//vel viska paleidzia
    }

    public function getData()//gaus
    {
        return $this->duomenys;
    }

    public function setData()//irasys duomenis
    {
        $this->duomenys = $duomenys;
    }

    public function getNewId()//kuriamas naujas id ir padidinamas
    {
        $id = $this->duomenys['ID'];
        $this->duomenys['ID']++;
        return $id;
    }

    public function addNew(Agurkas $obj)//objektas 
    {
        $this->duomenys['obj'][] = serialize($obj);
    }

    public function getAll()
    {
        $all = [];
        foreach($this->duomenys['obj'] as $obj) {
            $all[] = unserialize($obj);
        }
        return $all;
    }

    public function remove($id)
    {
        foreach($this->duomenys['obj'] as $index => $obj) {
            $obj = unserialize($obj);
            if ($obj->id == $id)
            {
                unset($this->duomenys['obj'][$index]);
            }
        } 
    }
}