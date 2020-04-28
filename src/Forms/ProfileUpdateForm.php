<?php
namespace Vuravel\Partials\Forms;

use App\User;
use Kompo\Form;
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

	public function komponents()
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