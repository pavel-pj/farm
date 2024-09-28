<?php

namespace App\Actions\Farm\Contracts;



abstract class Animal {

    private int $nubmer;
    private string $type;


    public function __construct(int $nubmer ) {
        $this->nubmer = $nubmer;

        $this->setType();

    }

    public function getNumber() : int {

        return $this->nubmer;
    }
    abstract public function getType() ;

    abstract public function setType()  ;


    abstract public function produceProduct()  ;



}