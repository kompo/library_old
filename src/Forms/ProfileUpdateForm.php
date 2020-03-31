<?php
namespace Vuravel\Partials\Forms;

use App\User;
use Vuravel\Form\Form;
use Vuravel\Partials\Forms\{ProfilePictureForm,ProfileCoverForm};

class ProfileUpdateForm extends Form
{
	public $model = User::class;

	public function created()
	{
		$this->recordKey = auth()->user()->getKey();
	}

	public function profileFields()
	{
		return [];
	}

	public function components()
	{
		return array_merge($this->profileFields(), [
			new ProfilePictureForm(),
			new ProfileCoverForm()
		]);
	}

	public function rules()
	{
		return [];
	}

}