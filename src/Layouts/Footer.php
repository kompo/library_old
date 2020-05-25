<?php

namespace Kompo\Library\Layouts;

use Kompo\Menu;

class Footer extends Menu
{
   public $class = 'bg-gray-300 mt-2';
   
   public function created()
   {
      if(request('ff'))
         $this->fixed = true;
      if(request('fo'))
         $this->order = request('fo');
   }

   public function komponents()
   {
      return [_Html('footer')->class('p-2 text-center text-gray-600 text-sm')];
   }
}