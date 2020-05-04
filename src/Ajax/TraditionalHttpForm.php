<?php 

namespace Kompo\Library\Ajax;

use Kompo\{Form, Button, Panel1};

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
                ->inPanel1(),

            Panel1::form(),

            Button::form('Http PUT')
                ->put('http-route', ['parameter' => 123], ['payload' => 'ajax-payload'])
                ->inAlert(),

            Button::form('Http DELETE')
                ->delete('http-route', ['parameter' => 123], ['payload' => 'ajax-payload'])
                ->hideSelf()
        ];
    }

}