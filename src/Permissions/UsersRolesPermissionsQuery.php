<?php

namespace Kompo\Library\Permissions;

use App\User;
use Kompo\{Table, Th, Html, EditLink};

class UsersRolesPermissionsQuery extends Table
{
    public function query()
    {
        return User::with('roles.permissions');
    }

    public function headers()
    {
        return [
            Th::form('Id')->sort('id'),
            Th::form('Name')->sort('name'),
            Th::form('Roles'),
            Th::form('Permissions')
        ];
    }

    public function card($item)
    {
        return [
            Html::form($item->id),
            EditLink::form($item->name)->class('font-bold')
                ->post('library.permissions.user-roles', ['id' => $item->id]),
            Html::form($item->roles->implode('name', ', ')),
            Html::form($item->roles->flatMap->permissions->implode('name', ', '))
        ];
    }

}