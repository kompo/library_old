<?php 

namespace Kompo\Library\Ajax;

use Kompo\{Form, Button, Html, Panel2};
use Kompo\Http\Requests\KompoFormRequest;

class SpecialAjaxForm extends Form
{
    public function komponents()
    {
        return [
            Button::form('getKomposer')
                ->getKomposer(SpecialAjaxForm::class, ['payload' => 'ajax-payload'])
                ->inModal(),

            Button::form('getView')
                ->getView('folder.blade-view', ['payload' => 'ajax-payload'])
                ->inModal(),

            Button::form('refresh #'.$this->incrementCounter())
                ->refresh(),

            Button::form('getKomponents')
                ->getKomponents('getKomponents', ['payload' => 'ajax-payload'])
                ->inPanel2(),
            Panel2::form()
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

    public function incrementCounter()
    {
        $counter = $this->store('counter') ?: 0;

        $this->store(['counter' => $counter + 1]);

        return $this->store('counter');
    }
}