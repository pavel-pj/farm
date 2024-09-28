<?php

namespace App\Actions\Farm\Factories;

use App\Actions\Farm\Contracts\AnimalFactory;
use App\Actions\Farm\Farm\Animals\Chicken;

class ChickenFactory extends AnimalFactory
{

    public function create($number) : Chicken
    {
        return new Chicken($number);
    }


}