<?php

namespace Kompo\Library;

use Illuminate\Database\Eloquent\Model as LaravelModel;

class Model extends LaravelModel
{
    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';

    const DELETABLE_BY = null;

    public function save(array $options = [])
    {
    	if(!$this->getKey() && static::CREATED_BY)
    		$this->{static::CREATED_BY} = auth()->user()->id;

        if(static::UPDATED_BY)
    	   $this->{static::UPDATED_BY} = auth()->user()->id;

    	parent::save($options);
    }

    public function deletable()
    {
    	return false;
    }
}