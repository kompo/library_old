<?php 

namespace Kompo\Library\Ajax;

use Kompo\{Form, Button, Html, Panel2};
use Kompo\Http\Requests\KompoFormRequest;

class SpecialAjaxForm extends Form
{
    public $class = 'p-4 pb-0';

    public function komponents()
    {
        return [
            Button::form('getKomposer')->class('mb-2')
                ->getKomposer(SpecialAjaxForm::class, ['payload' => 'ajax-payload'])
                ->inModal(),

            Button::form('getView')->class('mb-2')
                ->getView('folder.blade-view', ['payload' => 'ajax-payload'])
                ->inModal(),

            Button::form('refresh #'.$this->incrementCounter())->class('mb-2')
                ->refresh(),

            Button::form('getKomponents')->class('mb-2')
                ->getKomponents('getKomponents', ['payload' => 'ajax-payload'])
                ->inPanel2(),
            Panel2::form()->class('mb-2')
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