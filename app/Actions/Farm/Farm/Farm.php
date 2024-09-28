<?php

namespace App\Actions\Farm\Farm;

use Illuminate\Support\Collection;
use App\Actions\Farm\Factories\InitFactory;
use App\Actions\Farm\Managment\Manage;

class Farm {

    public Collection $animals ;

    public Manage $manager;


    public function life() {

         $this->createAnimals();
         $this->getReportALlAnimals();

         $this->storeProducts(7);
         $this->getReportProduction();

         $this->createChickens(5);
         $this->createCows(1);

         $this->getReportALlAnimals();
         
         $this->storeProducts(7);
         $this->getReportProduction();







    }



    public function createAnimals() : void {

        $this->animals=initFactory::create();
        $this->manager=new Manage( $this->animals);

        print "All animals has been created";
        print "\n \n";
    }

    public function showAnimalsAll(){

        //print "There are follow animals in the barn: \n";
        $this->manager->showAnimals();
        print "\n \n";
    }


    public function createChicken() {
        $this->manager->createChicken();
       }

    public function createCow() {

        $this->manager->createCow();

    }

    public function createChickens(int $amount) {
        $this->manager->createChickens($amount);
    }

    public function createCows(int $amount) {

        $this->manager->createCows($amount);
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