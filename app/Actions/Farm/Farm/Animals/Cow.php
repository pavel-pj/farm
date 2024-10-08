<?php

namespace App\Actions\Farm\Farm\Animals;

use App\Actions\Farm\Contracts\Animal;
use App\Actions\Farm\Farm\Products\Milk;
use App\Actions\Farm\Farm\Contracts\Product;
use App\Actions\Farm\Enum\AnimalType;

class Cow extends Animal   {


    public function setType(){

        $this->type = AnimalType::COW;

    }

    public function getType() {
        return $this->type;
    }
 
    public function produceProduct()
    {
        return new Milk(rand(8,12));
 
    }


}