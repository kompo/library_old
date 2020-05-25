<?php

namespace Kompo\Library\Layouts;

use Kompo\Menu;

class LeftSidebar extends Menu
{
	public $class = 'bg-indigo-100 w-8 mr-2';

	public $style = 'min-height: 8rem; display: block';

	public $collapse = false;
	
	public function created()
	{
		if(request('lf'))
			$this->fixed = true;
		if(request('lo'))
			$this->order = request('lo');
	}

	public function komponents()
	{
		return [_Html('L<br>S')->class('p-2 text-center text-gray-600 text-sm')];
	}
}