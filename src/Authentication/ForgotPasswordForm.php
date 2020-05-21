<?php

namespace Kompo\Library\Authentication;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Kompo\{Form, Input, SubmitButton};

class ForgotPasswordForm extends Form
{
    use SendsPasswordResetEmails;
    
    public $class = 'p-4 mx-auto';
    public $style = 'max-width:350px';

    public function handle()
    {
        $response = $this->broker()->sendResetLink(
            $this->credentials(request())
        );

        return __($response);
    }

    public function komponents()
    {
        return [
            Input::form('Email')->name('email'),
            SubmitButton::form('Send password reset instructions')
                ->inAlert()
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