<?php 

namespace Main;

class Pomidoras extends Darzove {

 public function __construct($lastId)
    {
        $this->id = $lastId + 1;
        $this->count = 0;
        $photos = array("./photo/pomidoras1.jpg", "./photo/pomidoras2.jpg", "./photo/pomidoras3.jpg");
        $this->photo = $photos[array_rand($photos)];
        $this->priceE = 1.2;
    }

    public function auga() {
        return rand(2, 9);
    }
    public function priceD()
    {
        $this->priceE = 1.2;
        return $this->priceE;
    }
    
}