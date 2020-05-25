<?php

namespace Kompo\Library\Layouts;

use Kompo\Menu;

class RightSidebar extends Menu
{
	public $class = 'bg-indigo-100 w-8 ml-2';

	public $style = 'min-height: 8rem; display: block';

	public $collapse = false;
	
	public function created()
	{
		if(request('rf'))
			$this->fixed = true;
		if(request('ro'))
			$this->order = request('ro');
	}

	public function komponents()
	{
		return [_Html('R<br>S')->class('p-2 text-center text-gray-600 text-sm')];
	}
}