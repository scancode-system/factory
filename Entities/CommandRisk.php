<?php

namespace Modules\Factory\Entities;

use Modules\Factory\Entities\Command;
use Illuminate\Database\Eloquent\Model;

class CommandRisk extends Model
{
    protected $fillable = ['command_id', 'reference_id', 'shape_id', 'size_id', 'units'];

    public function command()
    {
        return $this->belongsTo(Command::class);
    }

    public function reference()
    {
        return $this->belongsTo(Reference::class);
    }

    public function shape()
    {
        return $this->belongsTo(Shape::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function command_fabric_command_risks()
    {
        return $this->hasMany(CommandFabricCommandRisk::class);
    }
    
    /* mutators */
    public function getProduceAttribute($value)
    {
        return Produce::loadProduceByReferenceShape($this->reference, $this->shape);
    }

    /* repository */
    public static function loadByCommand(Command $command)
    {
        return CommandRisk::where('command_id', $command->id)->get();
    }
}
