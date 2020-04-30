<?php 

namespace Kompo\Library\Ajax;

use Kompo\Button;
use Kompo\Form;
use Kompo\Http\Requests\KompoFormRequest;
use Kompo\Panel1;

class AllAjaxInteractionsForm extends Form
{
    public function komponents()
    {
        return [
            Button::form('Http GET')
                ->get('get-http-route', ['id' => 123], ['payload' => 'ajax-payload'])
                ->inModal(), //get is not supposed to have a payload
            Button::form('Http POST')
                ->post('post-http-route', ['id' => 123], ['payload' => 'ajax-payload'])
                ->inModal(),
            Button::form('Http PUT')
                ->put('put-http-route', ['id' => 123], ['payload' => 'ajax-payload'])
                ->inModal(),
            Button::form('Http DELETE')
                ->delete('delete-http-route', ['id' => 123], ['payload' => 'ajax-payload'])
                ->inModal(),

            Button::form('getKomponents')->getKomponents('getKomponents', ['payload' => 'ajax-payload'])
                ->inPanel1(),
            Button::form('getKomposer')->getKomposer(AllAjaxInteractionsForm::class, ['payload' => 'ajax-payload'])
                ->inModal(),
            Button::form('getView')->getView('deleteSelf', ['payload' => 'ajax-payload']),


            Button::form('self GET')->selfGet('selfGet', ['payload' => 'ajax-payload']), //get is not supposed to have a payload
            Button::form('self POST')->selfPost('selfPost', ['payload' => 'ajax-payload']),
            Button::form('self PUT')->selfPut('selfPut', ['payload' => 'ajax-payload']),
            Button::form('self DELETE')->selfDelete('selfDelete', ['payload' => 'ajax-payload']),

            Panel1::form()
        ];
    }

    public function getKomponents($payload, KompoFormRequest $request)
    {
        return [];
    }

    //public function getKomposer($payload, KompoFormRequest $request)  NOT SUPPOSED TO BE HANDLED WITH METHOD

    //public function getView($payload, KompoFormRequest $request)  NOT SUPPOSED TO BE HANDLED WITH METHOD

    public function selfGet($payload, KompoFormRequest $request)
    {

    }

    public function selfPost($payload, KompoFormRequest $request)
    {
        
    }

    public function selfPut($payload, KompoFormRequest $request)
    {
        
    }

    public function selfDelete($payload, KompoFormRequest $request)
    {
        
    }

}