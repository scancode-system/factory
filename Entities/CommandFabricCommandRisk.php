<?php

namespace Modules\Factory\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Factory\Entities\CommandFabric;

class CommandFabricCommandRisk extends Model
{
    protected $fillable = ['command_fabric_id', 'command_risk_id', 'weight', 'price'];

    protected $table = 'command_fabric_command_risk';

    public function command_fabric()
    {
        return $this->belongsTo(CommandFabric::class);
    }

    public function command_risk()
    {
        return $this->belongsTo(CommandRisk::class);
    }

    public function getRealAttribute($value)
    {
        return $this->command_risk->units*$this->command_fabric->sheets;
    }
    
}
