<?php
namespace Vuravel\Partials\Forms;

use Vuravel\Form\Form;
use Vuravel\Form\Components\{Input, Button};
use App\User;

class ProfileNameForm extends Form
{
	public $model = User::class;

	public function created()
	{
		$this->recordKey = auth()->user()->getKey();
	}

	public function components()
	{
		return [
			Input::form(__('Name'))->name('name'),
			Button::form(__('Save'))->submitsForm()
		];
	}

	public function rules()
	{
		return [
			'name' => 'required|min:2'
		];
	}

}