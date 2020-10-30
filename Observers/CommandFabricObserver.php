<?php

namespace Modules\Factory\Observers;

use Modules\Factory\Entities\Status;
use Modules\Factory\Entities\Produce;
use Modules\Factory\Entities\CommandFabric;
use Modules\Factory\Entities\CommandFabricCommandRisk;

class CommandFabricObserver
{

    public function created(CommandFabric $command_fabric){
        foreach($command_fabric->command->command_risks as $command_risk){
            $produce = Produce::loadByReferenceShapeFabric($command_risk->reference, $command_risk->shape, $command_fabric->fabric);
            CommandFabricCommandRisk::create([
                'command_fabric_id' => $command_fabric->id,
                'command_risk_id' => $command_risk->id,
                'weight' => $produce->weight,
                'price' => $produce->price
            ]);
        }
    }

}