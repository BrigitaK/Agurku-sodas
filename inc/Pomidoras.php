<?php 

namespace Main;

class Pomidoras extends Darzove {

 public function __construct($lastId)
    {
        $this->id = $lastId + 1;
        $this->count = 0;
        $photos = array("./photo/pomidoras1.jpg", "./photo/pomidoras2.jpg", "./photo/pomidoras3.jpg");
        $this->photo = $photos[array_rand($photos)];
        $this->priceE = 1.5;
    }

    public function auga() {
        return rand(2, 9);
    }
    public function priceD()
    {
        $url = file_get_contents("https://free.currconv.com/api/v7/convert?q=eur_usd&compact=ultra&apiKey=fcb8cfbc519ccc63fe6f");
        $json = json_decode($url, true);
        $rate = implode(" ",$json);
        $total = $rate * $this->priceE;
        $rounded = round($total,2);
        return $rounded;
    }
    
}