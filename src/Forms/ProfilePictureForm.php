<?php
namespace Vuravel\Partials\Forms;

use Vuravel\Form\Form;
use Vuravel\Form\Components\{Image};
use App\User;

class ProfilePictureForm extends Form
{
	public $model = User::class;

	public function components()
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