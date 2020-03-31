<?php
namespace Vuravel\Partials\Forms;

use Vuravel\Form\Form;
use Vuravel\Form\Components\{Hidden, Input, Password, Button, Link, Columns};

class AuthResetPasswordForm extends Form
{
	protected $submitTo = 'password.update';

	public function components()
	{
		return [
			Hidden::form('token')->value($this->parameter('token')),
			Input::form(__('Email'))->name('email')->value($this->parameter('email')),
			Password::form(__('Password'))->name('password'),
			Password::form(__('Password Confirmation'))->name('password_confirmation'),
			Columns::form(
				Button::form(__('Reset Password'))->submitsForm(),
				Link::form(__('Cancel'))->loadsView('login.form')->inModal()
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