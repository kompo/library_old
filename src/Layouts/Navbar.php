<?php 

namespace Kompo\Library\Layouts;

use Kompo\Menu;

class Navbar extends Menu
{
	public $class = 'bg-gray-300 mb-2';
	
	public function created()
	{
		if(request('nf'))
			$this->fixed = true;
		if(request('no'))
			$this->order = request('no');
	}

	public function komponents()
	{
		return [_Html('nav')->class('p-2 text-center text-gray-600 text-sm')];
	}
}

