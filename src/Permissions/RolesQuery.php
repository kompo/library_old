<?php

namespace Kompo\Library\Permissions;

use Kompo\Library\Permissions\Role;
use Kompo\{Table, EditLink, Html, DeleteLink, FlexBetween, Title, AddLink};

class RolesQuery extends Table
{
    public $headers = ['Role', 'Guard', 'Associated permissions', 'Delete'];

    public function query()
    {
        return new Role();
    }

    public function card($item)
    {
        return [
            EditLink::form($item->name)
                ->post('library.permissions.role', ['id' => $item->id]),
            Html::form($item->guard_name),
            Html::form($item->permissions->implode('name', ', ')),
            DeleteLink::byKey($item)
        ];
    }

    public function top()
    {
        return [
            FlexBetween::form(
                Title::form('The application\'s roles'),
                AddLink::form('Add a new role')->icon('icon-plus')
                    ->post('library.permissions.role')
            )
        ];
    }

}