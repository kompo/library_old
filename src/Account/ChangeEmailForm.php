<?php 

namespace Kompo\Library\Account;

use Kompo\Form;
use Kompo\{Input, SubmitButton};

class ChangeEmailForm extends Form
{
    public function handle($request)
    {
        $user = auth()->user();
        $user->email = $request->email;
        $user->email_verified_at = null;
        $user->save();
        
        $user->sendEmailVerificationNotification();
        
        return redirect()->route('verification.notice');
    }

    public function komponents()
    {
        return [
            Input::form('Email')->name('email')
                ->default(auth()->user()->email)
                ->comment('You will be asked to reverify your email after you change it.'),
            SubmitButton::form('Change email')
        ];
    }

    public function authorize()
    {
        return \Auth::check();
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email'
        ];
    }

}