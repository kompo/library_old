<?php 

namespace Kompo\Library\Ajax;

use Kompo\{Form, Button, Panel1};

class TraditionalHttpForm extends Form
{
    public function komponents()
    {
        return [
            Button::form('Http GET')->class('mb-2')
                ->get('http-route', ['parameter' => 123], ['payload' => 'ajax-payload'])
                ->inModal(),

            Button::form('Http POST')->class('mb-2')
                ->post('http-route', ['parameter' => 123], ['payload' => 'ajax-payload'])
                ->inPanel1(),

            Panel1::form()->class('mb-2'),

            Button::form('Http PUT')->class('mb-2')
                ->put('http-route', ['parameter' => 123], ['payload' => 'ajax-payload'])
                ->inAlert(),

            Button::form('Http DELETE')->class('mb-2')
                ->delete('http-route', ['parameter' => 123], ['payload' => 'ajax-payload'])
                ->hideSelf()
        ];
    }

}