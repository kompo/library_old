<?php
namespace Kompo\Library\Forms;

use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Vuravel\Auth\Invitation;
use Kompo\{Input, Password, SubmitButton, Link, Columns, Html};
use Kompo\Form;

class AuthRegisterForm extends Form
{
	public $class = 'p-4 mx-auto';
	public $style = 'max-width:350px';
	
	public $model = User::class;
	protected $redirectTo = 'verification.notice';

	protected $invitation;

	public function created()
	{
		if(config('auth.registration_by_invitation')){
			$this->store(['token' => request('token')?: $this->store('token')]);			
			$this->invitation = Invitation::where('token', $this->store('token'))->first();
		}
	}

	public function afterSave()
	{
		if(config('auth.registration_by_invitation')){
			$this->model->email_verified_at = now();
			$this->model->save();
			$this->model->assignRole($this->invitation->roles);
			$this->invitation->roles->each(function($role){
				$this->invitation->removeRole($role);
			});
			$this->invitation->delete();
		}
		event(new Registered($this->model));
        Auth::guard()->login($this->model);
	}

	public function komponents()
	{
		return config('auth.registration_by_invitation') ? 
			(
				$this->invitation ? 
					$this->registrationKomponents($this->invitation->email) :
					$this->invalidToken()
			):
			$this->registrationKomponents();
	}

	protected function registrationKomponents($prefilledEmail = '')
	{
		return [
			config('auth.user_has_profile') ?
				Input::form(__('Name'))->name('name')->sluggable('username') :
				Input::form(__('Name'))->name('name'),
			$prefilledEmail ?
				Input::form(__('Email'))->name('email')->value($prefilledEmail) :
				Input::form(__('Email'))->name('email'),
			Password::form(__('Password'))->name('password'),
			Columns::form(
				SubmitButton::form(__('Register')),
				Link::form(__('Already have an account?'))
					->href('login')
					->class('text-gray-600 text-sm italic')
			)
		];		
	}

	protected function invalidToken()
	{
		return [
			Html::form(__('InvalidTokenMessage'))
		];
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