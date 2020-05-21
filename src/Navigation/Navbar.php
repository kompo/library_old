<?php 

namespace Kompo\Library\Navigation;

use App\Post;
use Auth;
use Kompo\Library\Authentication\LogoutForm;
use Kompo\{Menu, Logo, NavSearch, CollapseOnMobile, Dropdown, Link, Button, AuthMenu, ImageRow};

class Navbar extends Menu
{
	public $fixed = true;

	public function komponents()
	{ 
	   return [
	      Logo::form('<b>Kompo</b>')->image('img/kompo-logo.svg'),

	      NavSearch::form('Search the docs...')
	      	->searchOptions(2, 'searchResults'),

	      CollapseOnMobile::form('☰')->leftMenu(

	         Dropdown::form('Docs')->submenu(
	            Link::form('Forms')->href('docs/forms'),
	            Link::form('Queries')->href('docs/queries'),
	            Link::form('Menus')->href('docs/menus')
	         ),

	         Button::form('Contact us')
	         	->get('contact-us-form')->inModal()

	      )->rightMenu(

	         Auth::user() ?

	            AuthMenu::form(Auth::user()->name)->icon('fa fa-user')->href('account.profile')
	            	->submenu(
	            		Link::form('Settings')->href('account.settings'),
	            		// more links...
	            		new LogoutForm()
	            	) :

	            Link::form('Login')->get('login-form')->inModal()

	      )
	   ];
	}

	/**
	 * Navigation search results
	 *
	 * @return array
	 */
	public function searchResults()
    {
        return Post::where('title', 'LIKE', '%'.request('search').'%')->get()
        	->map(function($post){

				return ImageRow::form([
					'title' => $post->title,
					'titleClass' => 'text-sm',
					'image' => asset($post->image['path']),
					'imageWidth'=> '3rem',
					'imageHeight'=> '3rem',
					'imageClass' => 'mr-3',
					'url' => route('post.read', ['id' => $post->id])
				]);

            })->all();
    }

}

