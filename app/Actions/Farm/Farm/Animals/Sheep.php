<?php

namespace App\Actions\Farm\Farm\Animals;

use App\Actions\Farm\Contracts\Animal;
use App\Actions\Farm\Farm\Products\Wool;
use App\Actions\Farm\Farm\Contracts\Product;
use App\Actions\Farm\Enum\AnimalType;

class Sheep extends Animal   {


    public function setType(){

        $this->type = AnimalType::SHEEP;

    }

    public function getType() {
        return $this->type;
    }

    public function produceProduct()
    {
        return new WOOL(rand(1,2));

    }


}