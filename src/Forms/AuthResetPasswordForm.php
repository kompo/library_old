<?php

namespace Vuravel\Partials\Forms;

use Kompo\Form;
use Kompo\{Hidden, Input, Password, SubmitButton, Link, Columns};

class AuthResetPasswordForm extends Form
{
	protected $submitTo = 'password.update';

	public function komponents()
	{
		return [
			Hidden::form('token')->value($this->parameter('token')),
			Input::form('Email')->name('email')->value($this->parameter('email')),
			Password::form('Password')->name('password'),
			Password::form('Password Confirmation')->name('password_confirmation'),
			Columns::form(
				SubmitButton::form('Reset Password'),
				Link::form('Cancel')->loadsView('login.form')->inModal()
			)
		];
	}

	public function rules()
	{
		return [
			'email' => 'required|email',
			'password' => 'required|confirmed|min:8'
		];
	}

}