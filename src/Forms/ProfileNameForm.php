<?php

namespace Kompo\Library\Forms;

use Kompo\Form;
use Kompo\{Input, SubmitButton};
use App\User;

class ProfileNameForm extends Form
{
	public $model = User::class;

	public function created()
	{
		$this->recordKey = auth()->user()->getKey();
	}

	public function komponents()
	{
		return [
			Input::form('Name')->name('name'),
			SubmitButton::form('Save')
		];
	}

	public function rules()
	{
		return [
			'name' => 'required|min:2'
		];
	}

}