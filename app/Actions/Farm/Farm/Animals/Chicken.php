<?php

namespace App\Actions\Farm\Farm\Animals;

use App\Actions\Farm\Contracts\Animal;
use App\Actions\Farm\Farm\Products\Egg;
class Chicken extends Animal   {


    public function setType(){

        $this->type = "chicken";

    }

    public function getType() {
        return $this->type;
    }



    public function produceProduct()
    {

       return new Egg(rand(0,1));
 
    }


}