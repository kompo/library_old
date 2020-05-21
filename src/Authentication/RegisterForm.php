<?php

namespace Kompo\Library\Authentication;

use App\User;
use Illuminate\Auth\Events\Registered;
use Kompo\{Form, Input, Password, FlexBetween, SubmitButton, Link};

class RegisterForm extends Form
{
    public $class = 'p-4 mx-auto';
    public $style = 'max-width:350px';
    protected $redirectTo = 'verification.notice';
    public $model = User::class;

    public function completed()
    {
        event(new Registered($this->model));
        \Auth::guard()->login($this->model);
    }

    public function komponents()
    {
        return [
            Input::form('Name')->name('name'),
            //If you wish the create a username, replace with this:
            //Input::form('Name')->name('name')->sluggable('username'),
            Input::form('Email')->name('email'),
            Password::form('Password')->name('password'),
            FlexBetween::form(
                SubmitButton::form('Register'),			 
                Link::form('Already have an account?')
                    ->href('login')
                    ->class('text-gray-600 text-sm italic')
            )
        ];
    }

    public function authorize()
    {
        return \Auth::guest();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string'
        ];
    }

}