<?php 

/*namespace Tomatoes;

use Vegetable\Darzove;

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
}*/
namespace Tomatoes;

use Vegetables\Darzove;

class Pomidoras extends Darzove {

    public function __construct($lastId) 
    {
        $this->id = $lastId + 1;
        $this->count = 0;
        $photos = [
            "./img/Moliugai/moliugas1.jpg", 
            "./img/Moliugai/moliugas2.jpg", 
            "./img/Moliugai/moliugas3.jpg",  
            "./img/Moliugai/moliugas4.jpg", 
            "./img/Moliugai/moliugas5.jpg", 
            "./img/Moliugai/moliugas6.jpg", 
    ];
        $this->photo = $photos[array_rand($photos)];
    }

    public function auga()
    {
        return rand(1, 3);
    }

}