<?php 

namespace Tomatoes;

use Vege\Darzove;

class Pomidoras extends Darzove {

    public function __construct($lastId)
    {
        $this->id = $lastId + 1;
        $this->count = 0;
        $photos = array("./photo/pomidoras1.jpg", "./photo/pomidoras2.jpg");
        $this->photo = $photos[array_rand($photos)];
    }

    public function auginti() {
        return rand(1, 5);
    }
}

