<?php

namespace Kompo\Library\Authentication;

use Kompo\{Form, Input, SubmitButton};
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordForm extends Form
{
    use SendsPasswordResetEmails;
    
    public $class = 'p-4 mx-auto';
    public $style = 'max-width:350px';

    public function handle($request)
    {
        return $this->sendResetLinkEmail($request);
    }

    public function komponents()
    {
        return [
            Input::form('Email')->name('email'),
            SubmitButton::form('Send password reset instructions')
        ];
    }

    public function authorize()
    {
        return \Auth::guest();
    }

    public function rules()
    {
        return [
            'email' => 'required|email'
        ];
    }

}