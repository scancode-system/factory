<?php

namespace Modules\Factory\Entities;

use Modules\Factory\Entities\Shape;
use Modules\Factory\Entities\Fabric;
use Illuminate\Database\Eloquent\Model;
use Modules\Factory\Entities\Reference;
use Illuminate\Database\Eloquent\Builder;

class Produce extends Model
{
    protected $fillable = ['reference_id', 'fabric_id', 'shape_id', 'length', 'units', 'weight'];


    public function reference()
    {
        return $this->belongsTo(Reference::class);
    }

    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }

    public function shape()
    {
        return $this->belongsTo(Shape::class);
    }

    public function getPriceAttribute($value)
    {
        return $this->weight*$this->fabric->price;
    }
    
    /** repository */
    public static function loadByReferenceShapeFabric($reference, $shape, $fabric){
        return Produce::where('reference_id', $reference->id)->where('shape_id', $shape->id)->where('fabric_id', $fabric->id)->first();
    }
    
    public static function loadProduceByReferenceShape($reference, $shape){
        return Produce::where('reference_id', $reference->id)->where('shape_id', $shape->id)->first();
    }

    public static function loadByReference($reference){
        return Produce::where('reference_id', $reference->id)->first();
    }

    public static function loadShapeByReferenceAndFabric($reference, $fabric){
        return Shape::whereHas('produces', function (Builder $query) use($reference, $fabric) {
            $query->where('reference_id', $reference->id)->
            where('fabric_id', $fabric->id);
        })->get();
    }

    public static function loadShapeByReference($reference){
        return Shape::whereHas('produces', function (Builder $query) use($reference) {
            $query->where('reference_id', $reference->id);
        })->get();
    }


}
