<?php

namespace Kompo\Library\Permissions;

use App\User;
use Kompo\{Form, Title, Input, MultiSelect, SubmitButton};

class UserRolesForm extends Form
{
    public $model = User::class;
    public $class = 'p-4';

    public function komponents()
    {
        return [
            Title::form($this->model()->name.'\'s roles'),
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