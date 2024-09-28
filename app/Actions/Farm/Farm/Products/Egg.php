<?php

namespace App\Actions\Farm\Farm\Products;

use App\Actions\Farm\Contracts\Product;

class Egg extends Product{

    public function setType() {
        $this->type="Egg";
    }


}