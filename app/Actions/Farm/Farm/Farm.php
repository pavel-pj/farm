<?php

namespace App\Actions\Farm\Farm;

use Illuminate\Support\Collection;
use App\Actions\Farm\Factories\InitFactory;
use App\Actions\Farm\Managment\Manage;
use App\Actions\Farm\Enum\AnimalType;

class Farm {

    public Collection $animals ;

    public Manage $manager;


    public function life() {

         $this->initAnimals();
         $this->getReportALlAnimals();

         $this->storeProducts(7);
         $this->getReportProduction();

         $this->createAnimal(AnimalType::CHICKEN,5);
         $this->createAnimal(AnimalType::COW,1);
         $this->createAnimal(AnimalType::SHEEP,4);

         $this->getReportALlAnimals();
         
         $this->storeProducts(7);
         $this->getReportProduction();



    }



    public function initAnimals() : void {

        $this->animals=initFactory::create();
        $this->manager=new Manage( $this->animals);

        print "All animals has been initialized\n";
        print "\n \n";
    }

    public function createAnimal(AnimalType $animalType, int $count=1) {

        $this->manager->createAnimal($animalType,$count);

    }


    public function storeProducts(int $days){
        $this->manager->storeProducts($days);
    }

    public function getReportALlAnimals() {

        $this->manager->getReportALlAnimals();

    }
    public function getReportProduction() {
        $this->manager->getReportProduction();

    }







}