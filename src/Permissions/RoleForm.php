<?php

namespace Kompo\Library\Permissions;

use Kompo\Library\Permissions\Role;
use Kompo\{Title, Input, MultiSelect, SubmitButton};

class RoleForm extends \VlForm
{
    public $model = Role::class;
    public $class = 'p-4';

    public function components()
    {
        return [
            Title::form(($this->creating() ? 'Add a' : 'Edit').' role'),
            Input::form('Name'),
            Input::form('Guard')->name('guard_name')->default('web'),
            MultiSelect::form('Permissions')->optionsFrom('id', 'name'),
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
            'name' => 'required',
            'guard_name' => 'required',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id'
        ];
    }
}