<?php

namespace Kompo\Library\Navigation;

use Kompo\{Menu, Link};
use Kompo\Library\Navigation\NewsletterForm;

class Footer extends Menu
{
   public $id = 'vl-footer'; //For styling

   public $class = 'flex-col'; //To place child komponent in a Column

   public function komponents()
   {
      return [
         _FlexCenter( new NewsletterForm() ),

         _FlexCenter(
				
            Link::form('Docs')->href('docs'),

            Link::form('Github')->icon('fab fa-github')
               ->href('https://github.com/kompo/kompo')->target('_blank'),

            Link::icon('fab fa-stack-overflow')
               ->href('https://stackoverflow.com/questions/tagged/kompo')->target('_blank'),

            Link::icon('fab fa-twitter')
               ->href('https://twitter.com/kompophp')->target('_blank'),

            Link::icon('fab fa-facebook')
               ->href('https://facebook.com/kompophp')->target('_blank')
         )
      ];
   }

}