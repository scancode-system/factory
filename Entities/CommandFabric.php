<?php

namespace Modules\Factory\Entities;

use Modules\Factory\Entities\Color;
use Modules\Factory\Entities\Fabric;
use Modules\Factory\Entities\Command;
use Illuminate\Database\Eloquent\Model;

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

    /* mutators */
    public function getWeightAttribute($value)
    {
        return 0;
    }

    /* repository */
    public static function loadByCommand(Command $command){    
        return CommandFabric::where('command_id', $command->id)->get();
    }
}
