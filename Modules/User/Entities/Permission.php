<?php

namespace Modules\User\Entities;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    protected $table = 'permissions';
    public $guarded = [];
}
