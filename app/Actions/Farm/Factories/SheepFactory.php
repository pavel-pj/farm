<?php

namespace App\Actions\Farm\Factories;

use App\Actions\Farm\Contracts\AnimalFactory;
use App\Actions\Farm\Farm\Animals\Sheep;

class SheepFactory extends AnimalFactory
{

    public function create($number) : Sheep
    {

        return new Sheep($number);
    }


}