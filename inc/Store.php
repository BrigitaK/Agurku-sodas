<?php
/*
namespace Main;

class Store {

    private const PATH = DIR.'/data/';
    private $fileName = 'main';
    private $data;

    public function __construct($file) 
    {
        $this->fileName = $file;
        if(!file_exists(self::PATH.$this->fileName.'.json')) {
            file_put_contents(self::PATH.$this->fileName.'.json', json_encode(['obj' => [], 'objP' => [], 'objM' => [],'ID' => 0, 'photo' => '' ]));//pradinis masyvas
            $this->data = ['obj' => [], 'objP' => [], 'objM' => [],'ID' => 0, 'photo' => '' ];
        }
        else {
            $this->data = file_get_contents(self::PATH.$this->fileName.'.json');
            $this->data = json_decode($this->data,1);
        }
    }

    public function _destruct() 
    {
        file_put_contents(self::PATH.$this->fileName.'.json', json_encode($this->data));//vel viska paleidzia
    }

    public function getData()//gaus
    {
        return $this->data;
    }

    public function setData($data)//irasys duomenis
    {
        $this->data = $data;
    }

    public function getNewId()//kuriamas naujas id ir padidinamas
    {
        $id = $this->data['ID'];
        $this->data['ID']++;
        return $id;
    }

    public function addNew(Agurkas $obj)//objektas 
    {
        $this->data['obj'][] = serialize($obj);
    }

     public function addNewM(Moliugas $obj)//objektas 
    {
        $this->data['objM'][] = serialize($obj);
    }

    public function addNewP(Pomidoras $obj)//objektas 
    {
        $this->data['objP'][] = serialize($obj);
    }

    public function getAll()
    {
        $all = [];
        foreach($this->data['obj'] as $obj) {
            $all[] = unserialize($obj);
        }
        return $all;
    }

    public function remove($id)
    {
        foreach($this->data['obj'] as $index => $obj) {
            $obj = unserialize($obj);
            if ($obj->id == $id)
            {
                unset($this->data['obj'][$index]);
            }
        } 
    }
}*/
namespace Main;


class Store {

    private const PATH = DIR.'/data/';

    private $fileName = 'sodas';
    private $data;

    public function __construct($file)
    {
        $this->fileName = $file;
        if (!file_exists(self::PATH.$this->fileName.'.json')) {
            file_put_contents(self::PATH.$this->fileName.'.json', json_encode(['obj' => [], 'objP' => [], 'objM' => [],'ID' => 0, 'photo' => '' ])); // pradinis masyvas
            $this->data = ['obj' => [], 'objP' => [], 'objM' => [],'ID' => 0, 'photo' => '' ];
        }
        else {
            $this->data = file_get_contents(self::PATH.$this->fileName.'.json'); // nuskaitom faila
            $this->data = json_decode($this->data, 1); // paverciam masyvu
        }
    }

    public function __destruct()
    {
        file_put_contents(self::PATH.$this->fileName.'.json', json_encode($this->data)); // viska vel uzsaugom faile
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getNewId()
    {
        $id = $this->data['ID'];
        $this->data['ID']++;
        return $id;
    }

    public function addNew(Agurkas $obj)
    {
        $this->data['obj'][] = serialize($obj);
    }
    public function addNewM(Moliugas $obj)//objektas 
    {
        $this->data['objM'][] = serialize($obj);
    }

    public function addNewP(Pomidoras $obj)//objektas 
    {
        $this->data['objP'][] = serialize($obj);
    }

    public function getAll()
    {
        $all = [];
        foreach($this->data['obj'] as $obj) {
            $all[] = unserialize($obj);
        }
        return $all;
    }
    public function getAllM()
    {
        $allM = [];
        foreach($this->data['objM'] as $obj) {
            $allM[] = unserialize($obj);
        }
        return $allM;
    }
    public function getAllP()
    {
        $allP = [];
        foreach($this->data['objP'] as $obj) {
            $allP[] = unserialize($obj);
        }
        return $allP;
    }


    public function remove($id)
    {
        foreach($this->data['obj'] as $index => $obj) {
            $obj = unserialize($obj);
            if ($obj->id == $id) {
                unset($this->data['obj'][$index]);
            }
        }
    }

    public function removeM($id)
    {
        foreach($this->data['objM'] as $index => $obj) {
            $obj = unserialize($obj);
            if ($obj->id == $id) {
                unset($this->data['objM'][$index]);
            }
        }
    }

    public function removeP($id)
    {
        foreach($this->data['objP'] as $index => $obj) {
            $obj = unserialize($obj);
            if ($obj->id == $id) {
                unset($this->data['objP'][$index]);
            }
        }
    }

    public function augintiAgurkus()
    {
        foreach($this->data['obj'] as $index => $obj)
        {
            $obj = unserialize($obj); 
            $obj->add($_POST['kiekis'][$obj->id]);
            $obj = serialize($obj); 
            $this->data['obj'][$index] = $obj;
        }
    }
    public function augintiPomidorus()
    {
        foreach($this->data['objP'] as $index => $obj)
        {
            $obj = unserialize($obj); 
            $obj->add($_POST['kiekis'][$obj->id]);
            $obj = serialize($obj); 
            $this->data['objP'][$index] = $obj;
        }
    }
    public function augintiMoliugus()
    {
        foreach($this->data['objM'] as $index => $obj)
        {
            $obj = unserialize($obj); 
            $obj->add($_POST['kiekis'][$obj->id]);
            $obj = serialize($obj); 
            $this->data['objM'][$index] = $obj;
        }
    }


}