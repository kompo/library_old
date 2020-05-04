<?php 

namespace Kompo\Library\Ajax;

use Kompo\{Form, Button, Panel4};
use Kompo\Http\Requests\KompoFormRequest;

class SelfHttpForm extends Form
{
    public function komponents()
    {
        return [
            Button::form('self GET')
                ->selfGet('selfGet', ['payload' => 'ajax-payload'])
                ->inModal(),

            Button::form('self POST')
                ->selfPost('selfPost', ['payload' => 'ajax-payload'])
                ->inAlert(),

            Button::form('self PUT')
                ->selfPut('selfPut', ['payload' => 'ajax-payload'])
                ->hideSelf(),
                
            Button::form('self DELETE')
                ->selfDelete('selfDelete', ['payload' => 'ajax-payload'])
                ->inPanel4(),
            Panel4::form()
        ];
    }

    //quick way
    public function selfGet()
    {
        return '<div class="p-4">self GET request response with payload: '.request('payload').'</div>';
    }

    //You can retrieve the payload as a variable (like in Laravel Controllers)
    public function selfPost($payload)
    {
        return '<div class="p-4">self POST request response with payload: '.$payload.'</div>';       
    }

    //You can also inject a FormRequest dependency for authorization & validation
    public function selfPut(KompoFormRequest $request)
    {
        return '<div class="p-4">self PUT request response with payload: '.$request->payload.'</div>';      
    }

    //Both of the above work too
    public function selfDelete($payload, KompoFormRequest $request)
    {
        //do something with $request...

        return '<div class="p-4">self DELETE request response with payload: '.$payload.'</div>'; 
    }

}