<?php

namespace Kompo\Library\Navigation;

use App\Newsletter;
use Kompo\Form;

class NewsletterForm extends Form
{
   public $model = Newsletter::class;

   public function beforeSave()
   {
      $this->model->ip = request()->ip(); //Spam control
   }

   public function response()
   {
      return 'Thanks! Your email has been added to our Newsletter';
   }

   public function komponents()
   {
      return [
         _Html('If you wish to be notified about our <u>quarterly</u> updates:'),

         _Columns(

            _Input('Email')->type('email')
               ->placeholder('Your email...')->noLabel()
               ->col('col-8'),

            _SubmitButton('Subscribe')
               ->inAlert()->col('col-4')

         )
      ];
   }

   public function rules()
   {
      return [
         'email' => 'required|email|unique:newsletters,email'
      ];
   }
}