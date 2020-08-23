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
	      Logo::image('img/reno.png'),

	      NavSearch::form('Search the docs...')
	      	->searchOptions(2, 'searchResults'),

	      CollapseOnMobile::form('☰')->leftMenu(

	         Dropdown::form('Shop')->submenu(
	            Link::form('Appliances')->href('appliances'),
	            Link::form('Furniture')->href('furniture'),
	            Link::form('Gardening')->href('gardening')
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
	public function searchProducts()
    {
        return Post::where('title', 'LIKE', '%'.request('search').'%')->get()
        	->map(function($product){

				return ImageRow::form([
					'title' => $product->title,
					'titleClass' => 'text-sm',
					'image' => asset($product->image['path']),
					'imageWidth'=> '3rem',
					'imageHeight'=> '3rem',
					'imageClass' => 'mr-3',
					'url' => route('product-page', ['id' => $product->id])
				]);

            })->all();
    }

}

