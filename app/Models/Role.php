<?php

namespace App\Models;

use App\Traits\TeamRelation;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use TeamRelation;
}
