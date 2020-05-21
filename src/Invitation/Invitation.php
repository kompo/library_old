<?php

namespace Kompo\Library\Invitation;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Invitation extends Model
{
    use HasRoles;
}
