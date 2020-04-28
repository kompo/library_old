<?php
namespace Vuravel\Partials\Forms;

use Kompo\Form;
use Kompo\{Image};
use App\User;

class ProfilePictureForm extends Form
{
	public $model = User::class;

	public function komponents()
	{
		return [
			Image::form(__('Profile picture'))->extraAttributes([
				'collection' => 'profile_picture'
			])->submitsForm()
		];
	}

	public function rules()
	{
		return [
			'profile_picture|*' => 'image'
		];
	}

}