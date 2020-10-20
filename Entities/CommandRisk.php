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


    /* repository */
    public static function loadByCommand(Command $command)
    {
        return CommandRisk::where('command_id', $command->id)->get();
    }
}
