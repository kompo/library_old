<?php

namespace Kompo\Library\Permissions;

use App\User;
use Vuravel\Catalog\Cards\TableRow;
use Kompo\{Th, Html, EditLink};

class UsersRolesPermissionsCatalog extends \VlCatalog
{
    public $layout = 'Table';
    public $card = TableRow::class;

    public function query()
    {
        return User::with('roles.permissions');
    }

    public function columns()
    {
        return [
            Th::form('Id')->sortsCatalog('id'),
            Th::form('Name')->sortsCatalog('name'),
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