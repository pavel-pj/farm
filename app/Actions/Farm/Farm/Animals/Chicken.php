<?php

namespace App\Actions\Farm\Farm\Animals;

use App\Actions\Farm\Contracts\Animal;
use App\Actions\Farm\Farm\Products\Egg;
use App\Actions\Farm\Enum\AnimalType;


class Chicken extends Animal   {


    public function setType(){

        $this->type = AnimalType::CHICKEN;

    }

    public function getType() {
        return $this->type;
    }



    public function produceProduct()
    {

       return new Egg(rand(0,1));
 
    }


}