<?php

namespace App\Actions\Farm\Managment;

use App\Actions\Farm\Contracts\Animal;
use App\Actions\Farm\Enum\AnimalType;
use Illuminate\Support\Collection;
use App\Actions\Farm\Factories\ChickenFactory;
use App\Actions\Farm\Factories\CowFactory;

class Manage
{

    public Collection $production;

    public function __construct(private Collection $animals )
    {
        $this->production = collect();
    }

      

     public function getLastAnimalNumber() : int {

        return $this->animals->last()->getNumber();

    }

    public function createAnimal(AnimalType $animalType, int $count=1 ) :void {


        $lastNumber = $this->getLastAnimalNumber() + 1;
        $animalInfo = $animalType->getAnimalInfo();
        $className = $animalInfo[1];

        $reflection = new \ReflectionClass("App\Actions\Farm\Factories\\" . $className);
        $factory = $reflection->newInstanceArgs();

        for ($i = 0; $i < $count; $i++) {
            $this->animals->push($factory->create($lastNumber));

        }

        ($count>1) ? $strEdning='s' : $strEdning='';
        print "It has been bought " .$count.' '. $animalInfo[0] .$strEdning . " \n";
        unset($factory);

    }


    public function storeProducts(int $days) {

         if( $this->production->isNotEmpty()) {

            foreach ($this->production as $item){
                unset($item);
            }

         }

         $this->production = collect([]);

        for ($day = 1; $day <= $days; $day++) {
            $this->animals->each(function ($item, $key) {

                $product = $item->produceProduct();
                $this->production->push($product);

            });
        }

    }


    public function getReportALlAnimals( )  {

        print "\n ------------------------- \n";
        print "Report : animal population \n";
        $types=collect($this->animals->groupBy('type'));

        $types=$types->map(function ($item, $key) {
            return [
                'type' => $key,
                'count'=> $item->count()
            ];

        })->values();

        $types->each(function ($item, $key) {

            print $item['type']. ' : ' . $item['count'];
            print " \n";
        });
        print "------------------------- \n";

    }


    public function getReportProduction() {

        print "\n ------------------------- \n";
        print "Report : production \n";

        $groupsProduction=collect($this->production->groupBy('type'));

        $reportProduction=$groupsProduction->map(function ($item, $key) {
            return [
                'type' => $key,
                'value'=> $item->sum('value')
            ];

        }) ;

        $reportProduction->each(function ($item, $key) {

            print $item['type']. ' : ' . $item['value'];
            print " \n";
        });
        print "------------------------- \n";

    }

 
}

