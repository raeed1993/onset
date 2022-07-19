<?php

namespace Modules\User\Interfaces\Admin;

use Illuminate\Http\Request;

interface AdminUserInterface

{
    public function index(Request $request);

    public function store($data);

    public function find($id);

    public function update($data);

    public function allUser();

    public function toggle_status($data);
}
