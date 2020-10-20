<?php

namespace Modules\Factory\Observers;

use Modules\Factory\Entities\Command;
use Modules\Factory\Entities\Status;

class CommandObserver
{

    public function creating(Command $command){
        $command->status_id = Status::OPEN;
    }

}