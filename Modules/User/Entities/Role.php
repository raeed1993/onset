<?php

namespace Modules\User\Entities;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    protected $table = 'roles';
    public $guarded = [];
}
