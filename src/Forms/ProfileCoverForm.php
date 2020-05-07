<?php
namespace Kompo\Library\Forms;

use Kompo\Form;
use Kompo\{Image, Button};
use App\User;

class ProfileCoverForm extends Form
{
	public $model = User::class;

	public function komponents()
	{
		return [
			Image::form(__('Cover Photo'))->name('cover_photo')->extraAttributes([
				'collection' => 'cover_photo'
			])->submit()
		];
	}

	public function rules()
	{
		return [
			'cover_photo|*' => 'image'
		];
	}

}