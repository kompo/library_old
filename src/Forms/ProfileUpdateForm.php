<?php
namespace Kompo\Library\Forms;

use App\User;
use Kompo\Form;
use Kompo\Library\Forms\{ProfilePictureForm,ProfileCoverForm};

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