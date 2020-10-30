<?php

namespace Modules\Factory\Entities;

use Modules\Factory\Entities\Status;
use Illuminate\Database\Eloquent\Model;
use Modules\Factory\Entities\Collection;
use Modules\Factory\Entities\CommandRisk;
use Modules\Factory\Entities\CommandFabric;

class Command extends Model
{
    protected $fillable = ['collection_id', 'code', 'status_id', 'closed_at'];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function command_fabrics(){
        return $this->hasMany(CommandFabric::class);
    }

    public function command_risks(){
        return $this->hasMany(CommandRisk::class);
    }

}
