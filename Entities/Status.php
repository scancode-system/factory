<?php

namespace Modules\Factory\Entities;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [];

    const OPEN = 1;
	const PROCESS = 2;
    const FINISHED = 3;
    
    public function getColorAttribute($value)
	{
		$color = '';
		switch ($this->id) {
			case self::OPEN:
			$color =  'success';
			break;
			case self::PROCESS:
			$color = 'info';
			break;
			case self::FINISHED:
			$color = 'secondary';
			break;
			default:
			break;
		}

		return $color;
	}
    
}
