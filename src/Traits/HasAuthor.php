<?php 

namespace Kompo\Library\Traits;

trait HasAuthor
{

    public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function save(array $options = [])
    {
    	if(auth()->user())
    		$this->user_id = auth()->user()->id;
    	
    	parent::save($options);
    }

	//Get only the relevant information on the user that posted the model
	public function author() { return $this->user()->select(['id','name']); }

	public function isAuthor() { return \Auth::user() && \Auth::user()->id == $this->user_id ; }

}