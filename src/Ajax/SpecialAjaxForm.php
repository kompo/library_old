<?php 

namespace Kompo\Library\Ajax;

use Kompo\{Form, Button, Html, Panel1};
use Kompo\Http\Requests\KompoFormRequest;

class SpecialAjaxForm extends Form
{
    public function komponents()
    {
        return [
            Button::form('getKomponents')
                ->getKomponents('getKomponents', ['payload' => 'ajax-payload'])
                ->inPanel1(),
            Panel1::form(),

            Button::form('getKomposer')
                ->getKomposer(AllAjaxInteractionsForm::class, ['payload' => 'ajax-payload'])
                ->inModal(),

            Button::form('getView')
                ->getView('folder.blade-view', ['payload' => 'ajax-payload'])
        ];
    }

    //Dependency injection works same as Laravel Controllers
    public function getKomponents($payload, KompoFormRequest $request)
    {
        return [
            Html::form('A back-end Komponent'),
            //... load more Komponents
        ];
    }
}