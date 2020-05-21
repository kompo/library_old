<?php

namespace Kompo\Library\Permissions;

use Kompo\Library\Permissions\Permission;
use Kompo\{Table, EditLink, Html, DeleteLink, FlexBetween, Title, AddLink};

class PermissionsQuery extends Table
{
    public $headers = ['Name', 'Guard name', 'Delete'];

    public function query()
    {
        return new Permission(); //querying all permissions
    }

    public function card($item)
    {
        return [
            EditLink::form($item->name)
                ->post('library.permissions.permission', ['id' => $item->id]),
            Html::form($item->guard_name),
            DeleteLink::byKey($item)
        ];
    }

    public function top()
    {
        return [
            FlexBetween::form(
                Title::form('The application\'s permissions'),
                AddLink::form('Add a new permission')->icon('icon-plus')
                    ->post('library.permissions.permission')
            )
        ];
    }

}