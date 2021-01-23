<?php 

namespace Main;

class Moliugas extends Darzove {

    public function __construct($lastId)
    {
        $this->id = $lastId + 1;
        $this->count = 0;
        $this->type = 'moliugas';
        $photos = array("./photo/moliugas.jpg", "./photo/moliugas1.jpg", "./photo/moliugas2.jpg");
        $this->photo = $photos[array_rand($photos)];
        $this->priceE = 1.8;
        $this->priceD = 1.21;
        $this->kiekAugti = rand(1, 3);
    }

    public function auga() {
        $this->kiekAugti = rand(1, 3);
        return $this->kiekAugti;
    }
    public function priceD()
    {
        // $url = file_get_contents("https://free.currconv.com/api/v7/convert?q=eur_usd&compact=ultra&apiKey=fcb8cfbc519ccc63fe6f");
        // $json = json_decode($url, true);
        // $rate = implode(" ",$json);
        // $total = $rate * $this->priceE;
        // $rounded = round($total,2);
        // return $rounded;
        $this->priceE = 1.8;
        $this->priceD = 1.21;
        $rounded = $this->priceE * $this->priceD;
        return $total = round($rounded,2);
    }
}