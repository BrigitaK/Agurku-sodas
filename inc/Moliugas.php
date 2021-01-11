<?php 

namespace Pumpkin;

use Vegetables\Darzove;

class Moliugas extends Darzove {

    public function __construct($lastId)
    {
        $this->id = $lastId + 1;
        $this->count = 0;
        $photos = array("./photo/moliugas.jpg", "./photo/moliugas1.jpg", "./photo/moliugas2.jpg");
        $this->photo = $photos[array_rand($photos)];
    }

    public function auga() {
        return rand(1, 3);
    }
}
