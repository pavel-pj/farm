<?php

namespace App\Actions\Farm\Contracts;

 
abstract class  AnimalFactory {
     abstract public function create($nubmer) : Animal ;

}