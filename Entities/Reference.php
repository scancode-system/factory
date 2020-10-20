<?php

namespace Modules\Factory\Entities;

use Modules\Factory\Entities\Produce;
use Illuminate\Database\Eloquent\Model;
use Modules\Factory\Entities\ReferenceCategory;

class Reference extends Model
{
    protected $fillable = ['reference_category_id', 'model'];

    public function reference_category()
    {
        return $this->belongsTo(ReferenceCategory::class);
    }

    public function produces()
    {
        return $this->hasMany(Produce::class);
    }

    public function getCodeAttribute($value)
    {
        return $this->reference_category->name.$this->model;
    }

}
