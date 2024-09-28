<?php

namespace App\Actions\Farm\Contracts;

abstract class Product {

    public String $type;
    public  int $value;

    public function __construct( int $value) {

        $this->value = $value;
        $this->setType();
    }

    public function getValue(): int {
        return $this->value;
    }

    public function getType(): String {
        return $this->type;
    }

    abstract public function setType() ;




}