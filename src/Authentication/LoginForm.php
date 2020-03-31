<?php

namespace Kompo\Library\Authentication;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Kompo\{Input, Password, Checkbox, Columns, SubmitButton, Link, Form};

class LoginForm extends Form
{
    use AuthenticatesUsers;

    public $class = 'p-4 mx-auto';
    public $style = 'max-width:350px';
    protected $redirectTo = '/';

    public function handle($request)
    {
        return $this->login($request);
    }

    public function components()
    {
        return [
            Input::form('Email')->name('email'),
            Password::form('Password')->name('password'),
            Checkbox::form('Remember me')->name('remember'),
            Columns::form(
                SubmitButton::form('Login')->block(),
                Link::form('Sign up')->outlined()->block()
                    ->href('register')
            ),
            Link::form('Forgot Your Password?')
            	->block()->class('text-center text-gray-600 text-sm italic')
                ->href('password.request')->inNewTab()                
        ];
    }

    public function authorize()
    {
        return \Auth::guest();
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }

}