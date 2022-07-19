<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\Admin\ToggleStatus;
use Modules\User\Interfaces\Admin\AdminUserInterface;
use Illuminate\Support\Facades\DB;
use Modules\User\Http\Requests\Admin\Store;
use Modules\User\Http\Requests\Admin\Update;

class AdminUserController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, AdminUserInterface $interface)
    {
        $users = $interface->index($request);
        return view('user::admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Store $request, AdminUserInterface $interface)
    {
        // dd($request->all());

        try {
            DB::beginTransaction();


            $interface->store($request->validated());
            $interface = $request->except(['permissions']);
            DB::commit();

            session()->flash('success', __('site.added_successfully'));
            return redirect()->route('users.index');

        } catch (\Exception $exception) {

            DB::rollBack();
            return redirect()->route('users.create')->withErrors($exception->getMessage());
        }
    }


    public function toggle_status(ToggleStatus $request, AdminUserInterface $interface)
    {
        return response()->json([
            'data' => $interface->toggle_status($request->validated())
        ]);
    }


    public function edit(AdminUserInterface $interface, $users)
    {
        $user = $interface->find($users);
        return view('user::admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Update $request, AdminUserInterface $interface)
    {

        try {
            DB::beginTransaction();


            $interface->update($request->validated());
            // $interface = $request->except(['permissions']);
            DB::commit();
            session()->flash('success', __('site.updated_successfully'));
            return redirect()->route('users.index');

        } catch (\Exception $exception) {

            DB::rollBack();

            return back();
        }
    }
    //end of update

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(User $users)
    {
        $users->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('users.index');
    }
}
