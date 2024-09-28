<?php

namespace App\Actions\Farm\Farm\Animals;

use App\Actions\Farm\Contracts\Animal;
use App\Actions\Farm\Farm\Products\Milk;

class Cow extends Animal   {


    public function setType(){

        $this->type = "cow";

    }

    public function getType() {
        return $this->type;
    }
 
    public function produceProduct()
    {
        return new Milk(rand(8,12));
 
    }


}