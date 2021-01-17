<?php 

namespace Main;

class Agurkas extends Darzove {

 public function __construct($lastId)
    {
        $this->id = $lastId + 1;
        $this->count = 0;
        $photos = array("./photo/agurkas1.jpg", "./photo/agurkas3.jpg", "./photo/agurkas2.jpg");
        $this->photo = $photos[array_rand($photos)];
        $this->priceE = 1.2;
        $this->dKursas = 0;
    }
    

    public function auga() {
        return rand(2, 9);
    }

    public function priceD()
    {
        $ch = curl_init();

        curl_setopt(
        $ch, CURLOPT_URL, 'https://free.currconv.com/api/v7/convert?q=EUR_USD&compact=ultra&apiKey=fcb8cfbc519ccc63fe6f'
        );//pasako kur mes eisime
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//returninam

        $answer = curl_exec($ch); // siuntimas ir laukimas atsakymo

        $answer = json_decode($answer);

        $this->dKursas = $answer;
        return $this->priceE * $this->dKursas;
    }
}