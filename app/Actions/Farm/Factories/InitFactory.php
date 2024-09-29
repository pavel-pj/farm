<?php

namespace App\Actions\Farm\Factories;

use Illuminate\Support\Collection;

class InitFactory {


    public static function create() : Collection {

        $barn=collect();;
        $animalNumber=0;
        $cowFactory=new CowFactory;
        $chickenFactory=new ChickenFactory;
        

        for ($c=1;  $c<=20; $c++) {

            $animalNumber++;
            $barn->push ($cowFactory->create($animalNumber));


        }

        for ($d=1;  $d<=10; $d++) {

            $animalNumber++;
            $barn->push ($chickenFactory->create($animalNumber));

        }

        unset ($cowFactory,$chickenFactory);

        return $barn;

    }

}
