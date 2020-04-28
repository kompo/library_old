<?php 

namespace Kompo\Library\Account;

use App\User;
use Kompo\{Input, SubmitButton};
use Illuminate\Validation\ValidationException;

class ChangeUsernameForm extends \VlForm
{
    public function handle($request)
    {
        $this->validateUsername($request);

        //if successful
        $user->username = $request->username;
        $user->save();

        return responseInSuccessModal(__('Username changed successfully!'));
    }

    public function validateUsername($request)
    {
        if(User::where('username', $request->username)->count())
            throw ValidationException::withMessages([
                'username' => __('This username is already taken')
            ]);
    }

    public function komponents()
    {
        return [
            Input::form('Username')->onInput( function($e){
                $e->submit('validateUsername')->debounce(700);
            }),
            SubmitButton::form('Save')
        ];
    }

    public function authorization()
    {
        return \Auth::check();
    }

    public function rules()
    {
        return [
            'username' => 'required|min:3|unique:users,username'
        ];
    }

}