<?php

namespace Kompo\Partials\Forms;

use Kompo\Form;
use Kompo\{Input, SubmitButton};

class AuthForgotPasswordForm extends Form
{
	public $class = 'p-4 mx-auto';
	public $style = 'max-width:340px';

	protected $submitTo = 'password.email';

	public function komponents()
	{
		return [
			Input::form('Email')->name('email'),
			SubmitButton::form('Send password reset instructions')
		];
	}

	public function rules()
	{
		return [
			'email' => 'required|email'
		];
	}

}