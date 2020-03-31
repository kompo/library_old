<?php

namespace Kompo\Library\Permissions;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    //Since we are using the DeleteLink component in the Catalog,
    //we extend Spatie's Permission model to set the deletable authorization logic.
    public function deletable()
    {
        return auth()->user() && auth()->user()->hasRole('admin|super-admin');
    }
}
