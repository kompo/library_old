<?php

namespace Kompo\Library\Navigation;

use Kompo\Menu;

class Sidebar extends Menu
{
	public $fixed = true;
	
	public $class = 'docs-sidebar';

	public $style = 'width:170px';

	public function komponents()
	{
		return [
			//INSTALLATION
			$this->regularLink('Installation')->href('docs.ia'),
			$this->regularLink('About')->href('docs.ia')->addHash('about'),

			//KOMPONENTS
			$this->sectionHeader('KOMPONENTS'),
			$this->collapseLink('Komponents', [
				'Komponent Types',
				'Instantiation',
				'Komponents API',
				'Fields in depth',
				'Interactions & AJAX'
			]),
			$this->regularLink('CSS Styles')->href('docs/css-styles'),

			//KOMPOSERS
			$this->sectionHeader('KOMPOSERS'),
			$this->regularLink('Introduction')->href('docs.ks'),
			$this->regularLink('Commands')->href(route('docs.ks').'#generating-templates'),
			$this->collapseLink('Forms', [
				'Komposing a form',
				'Form parameters',
				'Types of Forms',
				'1 Eloquent Form',
				'2 Self-Handling Form',
				'3 Traditional Form'
			], 1),
			$this->collapseLink('Queries', [
				'Query template',
				'Catalog sections',
				'Catalog parameters',
				'Displaying Cards',
				'Filter & Sort'
			], 2),
			$this->collapseLink('Menus', null, 3),
			$this->regularLink('Layouts')->href('docs.lt'),
			$this->regularLink('Route render')->href('docs.rd'),
			$this->regularLink('Blade Render')->href('docs.rd')->addHash('blade-render'),

			//SECURITY
			$this->sectionHeader('SECURITY'),
			$this->regularLink('Authorization')->href('docs.av'),
			$this->regularLink('Validation')->href('docs.av')->addHash('validation'),

			//TESTING
			$this->sectionHeader('TESTING'),
			$this->regularLink('Testing / TDD')->href('docs/testing'),

			//ADVANCED
			$this->sectionHeader('ADVANCED'),
			$this->regularLink('Usage in Vue')->href('docs.vu'),
			$this->regularLink('Custom Komponents')->href('docs.ck'),
			$this->regularLink('Custom Cards')->href('docs.cc'),

			//CONDITIONAL DISPLAY
			request()->path() == 'docs' ? 

				null :

				$this->regularLink('Improve this page')->icon('far fa-thumbs-up')
					->style('font-weight:400; font-size: 0.8rem')
					->href('https://github.com/kompophp/docs/blob/master/'.request('p').'.blade.php')
					->inNewTab()
		];
	}

	/********************************
	 **** PROTECTED KOMPONENTS ******
	 *******************************/

	//Docs Sidebar Section Header
	protected function sectionHeader($label)
	{
		return _Html($label)->class('color4 font-xs font-bold pl-4 pt-2');
	}

	//Docs Sidebar Regular Link
	protected function regularLink($label)
	{
		return _Link($label)->class('font-bold py-1 pl-4 color2');
	}

	//Docs Sidebar Collapse Link
	protected function collapseLink($mainLabel, $links = [], $decoration = null)
	{
		$fullLabel = ($decoration ? ('<span class="color4">'.$decoration.'</span> &nbsp;') : '').$mainLabel);

		return _Collapse($fullLabel)
			->class('font-bold py-1 pr-0 color2'.($decoration ? ' pl-1' : ' pl-4'))
			->href('docs/'.strtolower($mainLabel))
			->submenu(collect($links)->map(function($label) use($decoration) {
				return _Link($label)->addHash()
					->class('pt-1 pr-0 pb-0 text-gray-600'.($decoration ? ' pl-4' : ' pl-0'));
			}))->expandIfActive();
	}

}