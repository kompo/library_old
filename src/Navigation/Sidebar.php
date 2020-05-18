<?php

namespace Kompo\Library\Navigation;

use Kompo\Menu;

class Sidebar extends Menu
{
	public $fixed = true;

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
			]),
			$this->collapseLink('Queries', [
				'Query template',
				'Catalog sections',
				'Catalog parameters',
				'Displaying Cards',
				'Filter & Sort'
			]),
			$this->collapseLink('Menus', null),
			$this->regularLink('Layouts')->href('docs.lt'),
			$this->regularLink('Route render')->href('docs.rd'),
			$this->regularLink('Blade Render')->href('docs.rd')->addHash('blade-render'),

			//SECURITY
			$this->sectionHeader('SECURITY'),
			$this->regularLink('Authorization')->href('docs.av'),
			$this->regularLink('Validation')->href('docs.av')->addHash('validation'),

			//CONDITIONAL DISPLAY
			request()->path() == 'docs' ? 

				null :

				$this->regularLink('Improve this page')->icon('far fa-thumbs-up')
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
	protected function collapseLink($label, $links = [])
	{
		return _Collapse($label)->class('font-bold py-1 pr-0 color2 pl-4')
			->href('docs/'.strtolower($label))
			->submenu(collect($links)->map(function($label) {

				return _Link($label)->addHash()->class('pt-1 pr-0 pb-0 text-gray-600 pl-4');

			}))->expandIfActive();
	}

}