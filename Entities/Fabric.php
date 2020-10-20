<?php

namespace Modules\Factory\Entities;

use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    protected $fillable = ['name', 'code', 'meter', 'price'];
}
