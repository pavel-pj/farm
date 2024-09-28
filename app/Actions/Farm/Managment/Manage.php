<?php

namespace App\Actions\Farm\Managment;

use App\Actions\Farm\Contracts\Animal;
use App\Actions\Farm\Enum\AnimalName;
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

    public function createChicken() : void{

         $lastNumber = $this->getLastAnimalNumber();
         $chickenFactory=new ChickenFactory;
         $this->animals->push ( $chickenFactory->create($lastNumber+1) );
         unset($chickenFactory);
         print "A chicken has been bought \n";

    }

    public function createCow() : void{


            $lastNumber = $this->getLastAnimalNumber();
            $cowFactory = new CowFactory;
            $this->animals->push($cowFactory->create($lastNumber + 1));
            unset($cowFactory);
            print "A cow has been bought \n";


    }


    public function createCows(int $amount){

          for ($x=1; $x<=$amount; $x++){
            $this->createCow();

        }

    }

    public function createChickens(int $amount){

        for ($x=1; $x<=$amount; $x++){
            $this->createChicken();
        }
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

