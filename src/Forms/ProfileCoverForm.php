<?php
namespace Vuravel\Partials\Forms;

use Vuravel\Form\Form;
use Vuravel\Form\Components\{Image, Button};
use App\User;

class ProfileCoverForm extends Form
{
	public $model = User::class;

	public function components()
	{
		return [
			Image::form(__('Cover Photo'))->name('cover_photo')->extraAttributes([
				'collection' => 'cover_photo'
			])->submitsForm()
		];
	}

	public function rules()
	{
		return [
			'cover_photo|*' => 'image'
		];
	}

}