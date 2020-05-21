<?php 

namespace Kompo\Library\Traits;

trait HasFiles
{

	public function files()
	{
		if(config('kompo.files.isMonogamous')){
			return $this->morphMany('App\File', 'attachable');
		}else{
			//for file library
			return $this->morphToMany('App\File', 'attachable');			
		}
	}

	public function file()
	{
		if(config('kompo.files.isMonogamous')){
			return $this->morphOne('App\File', 'attachable');
		}else{
			//morphToOne doesn't seem to exist
			return $this->morphToMany('App\File', 'attachable')->limit(1);			
		}
	}

}