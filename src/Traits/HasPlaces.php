<?php 

namespace Kompo\Library\Traits;

trait HasPlaces
{
	public function places()
	{
		return $this->morphMany('App\Place', 'model');
	}

	public function place()
	{
		return $this->morphOne('App\Place', 'model');
	}

}