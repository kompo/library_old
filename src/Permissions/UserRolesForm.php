<?php

namespace Kompo\Library\Permissions;

use App\User;
use Kompo\{Title, Input, MultiSelect, SubmitButton};

class UserRolesForm extends \VlForm
{
    public $model = User::class;
    public $class = 'p-4';

    public function components()
    {
        return [
            Title::form($this->record()->name.'\'s roles'),
            MultiSelect::form('Roles')->optionsFrom('id', 'name'),
            SubmitButton::form('Save')
        ];
    }

    public function authorize()
    {
        return auth()->user() && auth()->user()->hasRole('admin|super-admin');
    }

    public function rules()
    {
        return [
            'roles' => 'array',
            'roles' => 'exists:roles,id'
        ];
    }

}