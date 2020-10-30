<?php

namespace Modules\Factory\Observers;

use Modules\Factory\Entities\Produce;
use Modules\Factory\Entities\CommandRisk;
use Modules\Factory\Entities\CommandFabricCommandRisk;

class CommandRiskObserver
{

    public function created(CommandRisk $command_risk){
        foreach($command_risk->command->command_fabrics as $command_fabric){
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