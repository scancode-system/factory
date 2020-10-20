<?php

namespace Modules\Factory\Entities;

use Modules\Factory\Entities\Produce;
use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    protected $fillable = ['name'];

    public function produces(){
        return $this->hasMany(Produce::class);
    }
}
