<?php

namespace Kompo\Library\Permissions;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    //Since we are using the DeleteLink component in the Query class,
    //we extend Spatie's Role model to set the deletable authorization logic.
    public function deletable()
    {
        return auth()->user() && auth()->user()->hasRole('admin|super-admin');
    }
}
