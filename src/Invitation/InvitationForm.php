<?php

namespace Kompo\Library\Invitation;

use Illuminate\Support\Str;
use Kompo\{Form, Hidden, Input, Select, SubmitButton};
use Kompo\Library\Invitation\Invitation;
use Kompo\Library\Invitation\InvitedToRegisterEvent;

class InvitationForm extends Form
{
	public $class = 'p-4 mx-auto';
	public $style = 'max-width:350px';

	public $model = Invitation::class;

	public function afterSave($invitation)
	{
		event(new InvitedToRegisterEvent($invitation));
	}

	public function response()
	{
		return responseInSuccessModal(__('Your invitation has been sent!'));
	}

	public function komponents()
	{
		return [
			Hidden::form('token')->value(Str::random(60)),
			Input::form('Email')->name('email'),
			Select::form('Role')->name('roles')->optionsFrom('id','name'),
			SubmitButton::form('Send invitation')
		];
	}

	public function rules()
	{
		return [
			'email' => 'required|email'
		];
	}

}