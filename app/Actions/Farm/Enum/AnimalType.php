<?php

declare(strict_types=1);

namespace App\Actions\Farm\Enum;

enum AnimalType: string
{
    case COW= 'cow';

    case CHICKEN = 'chicken';
    case SHEEP = 'sheep';

    public function getAnimalInfo() : array
    {
        return match($this) {


            AnimalType::COW => ['Cow','CowFactory'],
            AnimalType::CHICKEN => ['Chicken','ChickenFactory'],
            AnimalType::SHEEP => ['Sheep','SheepFactory']

        };
    }


}