<?php

namespace Kompo\Library\Authentication;

use Kompo\{Form, Link};

class LogoutForm extends Form
{
    protected $redirectTo = '/';

    public function handle()
    {
        \Auth::guard()->logout();
        //$locale = session('kompo_locale');  //for multi-lang sites
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        //session( ['kompo_locale' => $locale] );  //for multi-lang sites
    }

    public function komponents()
    {
        return [
            Link::form('Logout')->submit()
        ];
    }

    public function authorize()
    {
        return \Auth::check();
    }

}