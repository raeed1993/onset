<?php

namespace Modules\User\Repositories\Admin;


use App\Models\User;
use Carbon\Carbon;
use Modules\User\Interfaces\Admin\AdminUserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserRepository implements AdminUserInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
//        $users = User::withoutGlobalScope('block')->when($request->search, function ($query) use ($request) {
//            return $query->where('name', 'like', '%' . $request->search . '%');
//        })->latest()->Paginate(10);

        // $users = User::paginate($paginate);
        $users = User::withoutGlobalScope('block')->get();
        return $users;

    }

    public function find($id)
    {
        return User::withoutGlobalScope('block')->find($id);
    }

    public function store($data)
    {

        $new_user = new User();
        $new_user->name = $data['name'];
        $new_user->email = $data['email'];
//        $new_user->phone = $data['phone'];

        $new_user->password = Hash::make($data['password']);
        $new_user->save();


        return $new_user;
    }

    public function update($data)
    {
        $user = User::withoutGlobalScope('block')->find($data['user_id']);
        // $new_user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
//        $user->phone = $data['phone'];
        if (isset($data['password']))
            $user->password = Hash::make($data['password']);


        $user->save();

        return $user;
    }

    public function allUser()
    {
        return User::withoutGlobalScope('block')->orderBy('id', 'desc')->pluck('name', 'id');
    }

    public function toggle_status($data)
    {
        $model = User::withoutGlobalScope('block')->find($data['user_id']);
        if (is_null($model->email_verified_at)) {
            $model->email_verified_at = Carbon::now();
        } else   $model->email_verified_at = null;

        $model->save();

        return $model;
    }
}


