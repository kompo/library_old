<?php 

namespace Kompo\Library\Ajax;

use Kompo\{Form, Button};

class TraditionalHttpForm extends Form
{
    public function komponents()
    {
        return [
            Button::form('Http GET')
                ->get('http-route', ['parameter' => 123], ['payload' => 'ajax-payload'])
                ->inModal(),

            Button::form('Http POST')
                ->post('http-route', ['parameter' => 123], ['payload' => 'ajax-payload'])
                ->inModal(),

            Button::form('Http PUT')
                ->put('http-route', ['parameter' => 123], ['payload' => 'ajax-payload'])
                ->inModal(),
                
            Button::form('Http DELETE')
                ->delete('http-route', ['parameter' => 123], ['payload' => 'ajax-payload'])
                ->inModal()
        ];
    }

}