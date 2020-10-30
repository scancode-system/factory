<?php

namespace Modules\Factory\Entities;

use Modules\Factory\Entities\Color;
use Modules\Factory\Entities\Fabric;
use Modules\Factory\Entities\Command;
use Illuminate\Database\Eloquent\Model;
use Modules\Factory\Entities\CommandFabricCommandRisk;

class CommandFabric extends Model
{
    protected $fillable = ['command_id', 'fabric_id', 'color_id', 'sheets'];


    public function command()
    {
        return $this->belongsTo(Command::class);
    }

    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function command_fabric_command_risks()
    {
        return $this->hasMany(CommandFabricCommandRisk::class);
    }

    /* mutators */
    public function getPrevisionAttribute($value)
    {
        $sum = 0;
        foreach ($this->command_fabric_command_risks as $command_fabric_command_risk) {
            $sum += $command_fabric_command_risk->real * $command_fabric_command_risk->weight;
        }
        return $sum;

        /*foreach ($command_fabrics as $command_fabric) {
            $command_fabric_command_risks = $command_fabric->command_fabric_command_risks;
            $sum = 0;
            foreach ($command_fabric_command_risks as $command_fabric_command_risk) {
                $sum += $command_fabric_command_risk->weight;
            }
            $command_fabric->weight = $sum;
        }*/

        /*$command_risks = CommandRisk::loadByCommand($this->command);
        $sum = 0;
        foreach($command_risks as $command_risk){
            $sum += ($command_risk->units*$this->sheets)*$command_risk->produce->weight; // deve ser $command_risk->weight
        }
        return $sum;*/
    }

    /* repository */
    public static function loadByCommand(Command $command)
    {
        return CommandFabric::where('command_id', $command->id)->get();
    }
}
