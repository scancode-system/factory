<?php

namespace Modules\Factory\Observers;

use Modules\Factory\Entities\Produce;

class ProduceObserver
{

    public function saving(Produce $produce){
        $produce->weight = $produce->length/$produce->units/$produce->fabric->meter;
    }

}