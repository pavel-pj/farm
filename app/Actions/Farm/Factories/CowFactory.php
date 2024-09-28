<?php

namespace App\Actions\Farm\Factories;

use App\Actions\Farm\Contracts\AnimalFactory;
use App\Actions\Farm\Farm\Animals\Cow;

class CowFactory extends AnimalFactory
{

    public function create($number) : Cow
    {
        
        return new Cow($number);
    }


}