<?php 

namespace Main;

class Agurkas extends Darzove {

 public function __construct($lastId)
    {
        $this->id = $lastId + 1;
        $this->count = 0;
        $photos = array("./photo/agurkas1.jpg", "./photo/agurkas3.jpg", "./photo/agurkas2.jpg");
        $this->photo = $photos[array_rand($photos)];
    }

    public function auga() {
        return rand(2, 9);
    }
}